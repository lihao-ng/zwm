<?php

namespace App\Services\Client;

use App\Transaction;
use App\TransactionItem;
use App\CustomItem;
use App\Customer;

use Illuminate\Http\Request;
use App\Services\TransformerService;

class AwardPointServices extends TransformerService{
	public function index($request){
		$sort = $request->sort ? $request->sort : 'created_at';
		$order = $request->order ? $request->order : 'desc';
		$limit = $request->limit ? $request->limit : 10;
		$offset = $request->offset ? $request->offset : 0;
		$query = $request->search ? $request->search : '';

    $transactions = Transaction::where('merchant_id', current_user()->id)->where('type', 'Award');
    // ->where('name', 'like', "%{$query}%")->orderBy($sort, $order);
		$listCount = $transactions->count();

		$transactions = $transactions->limit($limit)->offset($offset)->get();

		return respond(['rows' => $this->transformCollection($transactions), 'total' => $listCount]);
  }

  public function create(Request $request){
    $request->validate([ 
      'unique_code' => 'required',
    ]);
    
    $customer = Customer::where('code', $request->unique_code)->first();
    $products = json_decode($request->products);
    $customItems = json_decode($request->custom_items);
    
    if(!$customer) {
      return validation_error('Not a valid user code.');
    }

    if($products == null && $customItems == null) {
      return validation_error('Please add an item.');
    }

    $transaction = new Transaction();
    $transaction->customer_id = $customer->id;
    $transaction->merchant_id = current_user()->merchant->id;
    $transaction->type = 'Award';
    $transaction->total_points = 0;

    $transaction->save();

    if($products != null) {
      $transaction = $this->createTransactionItems($transaction, $products);
    }

    if($customItems != null) {
      $transaction = $this->createCustomItems($transaction, $customItems);
    }
    
    $customer->total_points += $transaction->total_points;
    $customer->current_points += $transaction->total_points;
    $customer->save();

		return route('award-points.index');
  }

  public function createTransactionItems($transaction, $products){
    $totalPoints = 0;

    foreach($products as $product) {
      $transactionItem = new TransactionItem();
      $transactionItem->transaction_id = $transaction->id;
      $transactionItem->offer_id = $product->id;
      $transactionItem->quantity = $product->quantity;
      $transactionItem->points = $product->points;
      $transactionItem->save();

      $totalPoints += $product->quantity * $product->points;
    }

    $transaction->total_points += $totalPoints;
    $transaction->save();
    
    return $transaction;
  }

  public function createCustomItems($transaction, $customItems){
    $totalPoints = 0;

    foreach($customItems as $customItem) {
      $item = new CustomItem();
      $item->transaction_id = $transaction->id;
      $item->description = $customItem->description;
      $item->points = $customItem->points;
      $item->save();

      $totalPoints += $item->points;
    }

    $transaction->total_points += $totalPoints;
    $transaction->save();

    return $transaction;
  }

	public function transform($transaction){
		return [
			'id' => $transaction->id,
      'name' => $transaction->name,
      'points' => $transaction->points,
      'description' => $transaction->description,
			'photo' => $this->imageLibraryService->fullPath($transaction->photo)
		];
	}
}
