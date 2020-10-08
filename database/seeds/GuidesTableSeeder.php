<?php

use App\Guide;
use App\GuideContent;

use Illuminate\Database\Seeder;

class GuidesTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){
    Guide::truncate();
		GuideContent::truncate();
    
    $guides = [
			[
				"name" => "Aluminium beverage bottle",
				"category" => "Metal",
				"description" => "The generation of aluminium containers and packaging included beer, soft drink cans, foil and closures at almost two million tons in 2017, but only 1/2 of this material was recycled.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "Some aluminium beverage bottles are designed to be reused."
          ],
          [
            "name" => "Recycle",
            "description" => "A lot of recyclables end up at landfills because of food contamination. Make sure your recyclables contain no residual food debris. Give food and beverage containers a light rinse if necessary.\nRecycling must be loose(free of a plastic bag), clean, empty and dry."
          ]
        ]
			],
      [
				"name" => "Aluminium foil",
				"category" => "Metal",
				"description" => "The generation of aluminium containers and packaging included beer, soft drink cans, foil and closures at almost two million tons in 2017, but only 1/2 of this material was recycled.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "Some aluminium beverage bottles are designed to be reused."
          ],
          [
            "name" => "Recycle bin",
            "description" => "A lot of recyclables end up at landfills because of food contamination. Make sure your recyclables contain no residual food debris. Give food and beverage containers a light rinse if necessary.\nRecycling must be loose(free of a plastic bag), clean, empty and dry."
          ]
        ]
      ],
      [
				"name" => "Beverage carton",
				"category" => "Paper",
        "description" => "Beverage cartons are made not only of paper - there are plastic and aluminum layers, so it cannot be recycled in the same manner. Beverage cartons require special equipment and processing in order to be recycled.\n\nThe generation of aseptic and folding cartons, paper bags, wrapping paper and other paper and paperboard packaging, totaled to 8.5 million tons in 2017, and over 2/3 of it was landfilled.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "There are plenty of ways you can reuse that milk or juice carton for crafting - from improvised toys to bird boxes. https://www.redtedart.com/milk-carton-crafts-juice-tetra-pack-crafts/"
          ],
          [
            "name" => "Recycle bin",
            "description" => "Break and flatten boxes and other paper items with hollow space before putting them into your 'Recycle' bin.\n\nA lot of recyclables end up at landfills because of food contamination. Make sure your recyclables contain no residual food debris. Give food and beverage containers a light rinse if necessary.\n\nRecycling must be loose(free of a plastic bag), clean, empty and dry."
          ]
        ]
      ],
      [
				"name" => "Biodegradable bag",
				"category" => "Plastic",
        "description" => "Item must be clearly label 'Biodegradable' or 'Degradable'. Some items are also labeled 'I am not plastic'.\n\nBiodegrable plastics are plastics that decompose by the action of living organisms, usually microbes, into water, carbon dioxis, and biomass. They are designed to degrade in a landfil, and therefore should not be composted or placed in your 'Recycle' bin.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reduce",
            "description" => "Despite biodegradable plastic being better for the environment than regular plastic, reducing usage of disposable plastic items is always the best solution. Consider using a reusable bag for your daily needs!"
          ],
          [
            "name" => "Landfill",
            "description" => "While better than regular plastic, biodegradable plastic still goes to a landfill where the conditions are best of it to decompose. In the landfill it may only take 3 to 6 months to decompose.\n\nPlace materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic material in your ordinary bins."
          ]
        ]
      ],
      [
				"name" => "Biodegradable beverage bottle",
				"category" => "Plastic",
        "description" => "Item must be clearly label 'Biodegradable' or 'Degradable'. Some items are also labeled 'I am not plastic'.\n\nBiodegrable plastics are plastics that decompose by the action of living organisms, usually microbes, into water, carbon dioxis, and biomass. They are designed to degrade in a landfil, and therefore should not be composted or placed in your 'Recycle' bin.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reduce",
            "description" => "Despite biodegradable plastic being better for the environment than regular plastic, reducing usage of disposable plastic items is always the best solution. Consider using a reusable bag for your daily needs!"
          ],
          [
            "name" => "Landfill",
            "description" => "While better than regular plastic, biodegradable plastic still goes to a landfill where the conditions are best of it to decompose. In the landfill it may only take 3 to 6 months to decompose.\n\nPlace materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic material in your ordinary bins."
          ]
        ]
      ],
      [
				"name" => "Biodegradable egg carton",
				"category" => "Plastic",
        "description" => "Item must be clearly label 'Biodegradable' or 'Degradable'. Some items are also labeled 'I am not plastic'.\n\nBiodegrable plastics are plastics that decompose by the action of living organisms, usually microbes, into water, carbon dioxis, and biomass. They are designed to degrade in a landfil, and therefore should not be composted or placed in your 'Recycle' bin.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reduce",
            "description" => "Despite biodegradable plastic being better for the environment than regular plastic, reducing usage of disposable plastic items is always the best solution. Consider using a reusable bag for your daily needs!"
          ],
          [
            "name" => "Reuse",
            "description" => "Egg cartons can be considered as a one-time-use packaging as bacteria from foods that these packages once contained may remain on the packaging and thus be able to contaminate foods or even hands if reused.\n\nHowever, there are many ways you can reuse egg cartons in your DIY projects - you can start your research with this articles. https://homeguides.sfgate.com/10-ways-reuse-egg-cartons-79808.html"
          ],
          [
            "name" => "Landfill",
            "description" => "While better than regular plastic, biodegradable plastic still goes to a landfill where the conditions are best of it to decompose. In the landfill it may only take 3 to 6 months to decompose.\n\nPlace materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic material in your ordinary bins."
          ]
        ]
      ],
      [
				"name" => "Bubble wrap",
				"category" => "Plastic",
        "description" => "Plastic bags, wraps and other items made of soft plastic film are usually made of high-density (plastic #2) or low-density (plastic #4) polythylene that can be recycled, but it is often not accepted in your 'Recycle' bin.\n\nThe generation of plastic bags and wraps totaled to over 4 million tons in 2017, and almost 3/4 of it was landfilled.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "There're no reason why bubble wrap can't be reused! You can keep them to safely store items away (like seasonal decorations) or for packing breakables when moving. If you don't have a use for them and don't want to keep them, look at our map to find local business that might want to take them for you."
          ],
          [
            "name" => "Landfill",
            "description" => "These items are usually not accepted in your 'Recycle' bin, so if other listed options do not work for you, the only one left is the 'Landfill' bin.\n\n Place materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic materials in your black 'Landfill' bin,"
          ],
          [
            "name" => "Drop-off",
            "description" => "f you don't have a use for them and don't want to keep them, look at our map to find local business that might want to take them for you."
          ]
        ]
      ],
      [
				"name" => "Candle",
				"category" => "Hazardous",
        "description" => "Candles and wax are not accepted by recycling programs, so unless you have a chance to reuse them, the only option left is landfill.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "If you have unused candles you don't need, you can find organizations that will gladly accept new candles as donations.\n\nYou can use burned out candle bottoms and wax scraps to create new candles which could be layered and have mixed scents."
          ],
          [
            "name" => "Landfill",
            "description" => "These items are usually not accepted in your 'Recycle' bin, so if other listed options do not work for you, the only one left is the 'Landfill' bin.\n\n Place materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic materials in your black 'Landfill' bin,"
          ]
        ]
      ],
      [
				"name" => "Cardboard shipping box",
				"category" => "Hazardous",
        "description" => "Cardboard boxes were the largest single product category of municipal solid waste in 2017 at almost 33 miliion tons (or 12% of total waste generated). The recycling rate for corrugated boxes was 88%.\n\nIt also represent the largest single product of recycled paper and paperboard containers and packaging.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "Cardboard shipping boxes can be reused, flattened and saved for later, or donated to somebody who is moving."
          ],
          [
            "name" => "Recycle",
            "description" => "Paper, paperboard and cardboard used for shipping, packaging and other purposes can be recycled if not mixed with other materials.\n\nBreak and flatten boxes and other paper items with hollow space before putting them into your 'Recycle' bin.\n\nMake sure your paper items are clean, unsolied and dry. Wet or dirty paper is not acceptable for recycling but can be composted if this option is available to you.\n\nRecycling must be loose (free of a plastic bag), clean, empty and dry."
          ]
        ]
      ],
      [
				"name" => "Carpet",
				"category" => "Households",
        "description" => "The generation of carpets and rugs totaled to almost 3.5 million tons in 2017, and almost 3/4 of it was landfilled.\n\nThe EPA estimated that generation of clothes and other textiles was almost 17 million tons in 2017, and 2/3 of it was landfilled. That is 68 pounds of clothes and other textiles thrown away each year by each person in the US.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "There are many ways to reduce fabric waste, from reducing the amount you purchase to ensuring you get the most use out of each item you own. Below area few tips for reducing your fabric waste.\n\nBuy Only What You Need\nBefore you need to 'Marie Kondo' your closets, consider holding off on those new clothing purchases. Consider setting personal guidelines for what you buy such as 'only one new sweater this season' just to see how that impacts your buying decisions, you may just surprise yourself!\n\nExtend the Life of What You Own\nWhen new items can be a click away, it can seem easier to buy new rather than mending an existing item. However, just by keeping a mending kit and spending a few minutes might make that item reusable and even stylish... distressed jeans anyone?\n\nShare and Exchange Used Items\nInstead of purchasing new clothes or linens, organizing a fabric/clothing swap between friends. Clothing swaps range from simple, bring it all to one location and whatever is left over is donated, to specific rules such as each person brings only a certain number of items and must take back what's not swapped. Either way, a clothing swap is a great way to reduce buying new fabrics and extend the life of currently existing ones."
          ],
          [
            "name" => "Drop-Off",
            "description" => "Check out our map to find places where you can drop them off!"
          ]
        ]
			],
    ];

    foreach ($guides as $guide) {
      $createdGuide = new Guide();
      $createdGuide->name = $guide['name'];
      $createdGuide->category = $guide['category'];
      $createdGuide->description = $guide['description'];
      $createdGuide->recyclable = $guide['recyclable'] == 'Yes' ? 1 : 0;
      $createdGuide->save();

      foreach($guide['contents'] as $content) {
        $createdGuideContent = new GuideContent();
        $createdGuideContent->guide_id = $createdGuide->id;
        $createdGuideContent->name = $content['name'];
        $createdGuideContent->description = $content['description'];
        $createdGuideContent->save();
      }
		}
  }
}
