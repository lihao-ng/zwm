@extends('admin.layouts.master')

@section('meta-content')
  <title>Dashboard</title>
@endsection

@section('content')
  <div class="row emcq-dashboard-row">
    <div class="col-12 emcq-dashboard-col">
      <div class="row">
        <div class="info-box-col col-sm-6">
          <div class="info-box">
            <div class="icons">
              <div class="left">
                <img src="/images/dashboard/total-students-green.png" alt="Total Guides">
              </div>
              <div class="right">
                <i class="fal fa-info-circle"></i>
              </div>
            </div>
            <h3>Total Guides</h3>
            <p class="value">{{ number_format($totalGuides) }}</p>
          </div>
        </div>
        <div class="info-box-col col-sm-6">
          <div class="info-box">
            <div class="icons">
              <div class="left">
                <img src="/images/dashboard/total-subscription-blue.png" alt="Total Merchants">
              </div>
              <div class="right">
                <i class="fal fa-info-circle"></i>
              </div>
            </div>
            <h3>Total Merchants</h3>
            <p class="value">{{ number_format($totalMerchants) }}</p>
          </div>
        </div>
        <div class="info-box-col col-sm-12">
          <div class="info-box">
            <div class="icons">
              <div class="left">
                <img src="/images/dashboard/total-students-yellow.png" alt="Total Users">
              </div>
              <div class="right">
                <i class="fal fa-info-circle"></i>
              </div>
            </div>
            <h3>Total Users (App)</h3>
            <p class="value">{{ number_format($totalUsers) }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
