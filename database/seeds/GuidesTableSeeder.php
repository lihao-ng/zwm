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
