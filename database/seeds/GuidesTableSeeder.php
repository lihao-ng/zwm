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
            "name" => "Recycle",
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
            "name" => "Recycle",
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
            "description" => "These items are usually not accepted in your 'Recycle' bin, so if other listed options do not work for you, the only one left is the 'Landfill' bin.\n\n Place materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic materials in your black 'Landfill' bin."
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
            "description" => "These items are usually not accepted in your 'Recycle' bin, so if other listed options do not work for you, the only one left is the 'Landfill' bin.\n\n Place materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic materials in your black 'Landfill' bin."
          ]
        ]
      ],
      [
				"name" => "Cardboard",
				"category" => "Paper",
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
            "name" => "Drop-off",
            "description" => "Check out our map to find places where you can drop them off!"
          ]
        ]
      ],
      [
				"name" => "Cell phone",
				"category" => "Electronics",
        "description" => "Many components of electronic equipment contain metals, plastic and glass that can be recycled at special facilities, while others may present environmental hazards if not managed correctly.\n\nElectronic waste can have circuitry that contain toxic heavy metals such as mercury, lead, cadmium, zinc and nickel that can pollute groundwater and harm public health if not properly managed.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "\nTrade-in\n\nYou can trade in your used-but-functional electronics:from elementart schools to universities, civic centers, and non-profit organizations. Before donating your device, ensure you remove all data, saved passwords, and any programs that contain personal information. The best practice for hard drives or flash memory cards is format the media before donation. The best practice for gadgets that can store data would be to restore them to their factory default settings."
          ],
          [
            "name" => "Drop-off",
            "description" => "Check out our map to find places where you can drop them off!"
          ]
        ]
      ],
      [
				"name" => "Ceramic ware",
				"category" => "Households",
        "description" => "",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "Check out our map to find places where you can drop them off! If not, repurpose them."
          ],
          [
            "name" => "Landfill",
            "description" => "These items are usually not accepted in your 'Recycle' bin, so if other listed options do not work for you, the only one left is the 'Landfill' bin.\n\n Place materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic materials in your black 'Landfill' bin."
          ]
        ]
      ],
      [
				"name" => "Cigarette butt",
				"category" => "Hazardous",
        "description" => "",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Landfill",
            "description" => "Extinguished - run under water prior to disposal.\n\nThese items are usually not accepted in your 'Recycle' bin, so if other listed options do not work for you, the only one left is the 'Landfill' bin.\n\n Place materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic materials in your black 'Landfill' bin."
          ]
        ]
      ],
      [
				"name" => "Clothes",
				"category" => "Fabric",
        "description" => "",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reduce",
            "description" => "There are many ways to reduce fabric waste, from reducing the amount you purchase to ensuring you get the most use out of each item you own. Below area few tips for reducing your fabric waste.\n\nBuy Only What You Need\nBefore you need to 'Marie Kondo' your closets, consider holding off on those new clothing purchases. Consider setting personal guidelines for what you buy such as 'only one new sweater this season' just to see how that impacts your buying decisions, you may just surprise yourself!\n\nExtend the Life of What You Own\nWhen new items can be a click away, it can seem easier to buy new rather than mending an existing item. However, just by keeping a mending kit and spending a few minutes might make that item reusable and even stylish... distressed jeans anyone?\n\nShare and Exchange Used Items\nInstead of purchasing new clothes or linens, organizing a fabric/clothing swap between friends. Clothing swaps range from simple, bring it all to one location and whatever is left over is donated, to specific rules such as each person brings only a certain number of items and must take back what's not swapped. Either way, a clothing swap is a great way to reduce buying new fabrics and extend the life of currently existing ones."
          ],
          [
            "name" => "Reuse",
            "description" => "Check out our map to find places where you can donate them! By dropping off clothes you no longer need, your clothes will go to those who need it most.\n\nSell\n\nYard sales may be the easiest way to get those old fabrics out of the house and still there are plenty of other options - from taking them to consignment or thrift stores."
          ],
        ]
      ],
      [
				"name" => "Compact disc",
				"category" => "Plastic",
        "description" => "",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "Non-digital storage media like VHS and vinyl can be gifted or donated to various organizations including museums. Make sure to erase any sensitive personal information if applicable. Check out our map to find places where you can donate them!"
          ],
          [
            "name" => "Recycle",
            "description" => "Any compact discs (CD, DVD, etc) with cases. Remove inserted paper.\n\nRecycling must be loose (free of a plastic bag), clean, empty and dry."
          ],
        ]
      ],
      [
				"name" => "Compostable bag",
				"category" => "Plastic",
        "description" => "Item must be clearly labeled 'Compostable'. Some items are also labeled 'I am not plastic'.\n\nCompostable plastics are a new generation of plastics which are biodegradable through composting. Composting of some compostable plastics requires strict control of environmental factors, including higher temperatures, pressure and nutrient concentration, as well as specific chemical ratios. These conditions can only be recreated in industrial composting plants, so compostable plastics cannot be composted in your home DIY compost pile or bin.\n\nIf the green 'Compost' bin is not available in your area, the only option is the black 'Landfill' bin because it cannot be recycled",
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
				"name" => "Compostable beverage bottle",
				"category" => "Plastic",
        "description" => "Item must be clearly labeled 'Compostable'. Some items are also labeled 'I am not plastic'.\n\nCompostable plastics are a new generation of plastics which are biodegradable through composting. Composting of some compostable plastics requires strict control of environmental factors, including higher temperatures, pressure and nutrient concentration, as well as specific chemical ratios. These conditions can only be recreated in industrial composting plants, so compostable plastics cannot be composted in your home DIY compost pile or bin.\n\nIf the green 'Compost' bin is not available in your area, the only option is the black 'Landfill' bin because it cannot be recycled",
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
				"name" => "Compostable food box",
				"category" => "Plastic",
        "description" => "Item must be clearly labeled 'Compostable'. Some items are also labeled 'I am not plastic'.\n\nCompostable plastics are a new generation of plastics which are biodegradable through composting. Composting of some compostable plastics requires strict control of environmental factors, including higher temperatures, pressure and nutrient concentration, as well as specific chemical ratios. These conditions can only be recreated in industrial composting plants, so compostable plastics cannot be composted in your home DIY compost pile or bin.\n\nIf the green 'Compost' bin is not available in your area, the only option is the black 'Landfill' bin because it cannot be recycled",
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
				"name" => "Cooking oil",
				"category" => "Households",
        "description" => "Recovering cooking oil is extremely important since it clogs water systems and can pose a threat to piping (both in your home and city) - not to mention that used oils can be reused as biofuel.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reduce",
            "description" => "30 - 40% of the food supply is wasted annually. The best way to approach food waste starts with smarter food planning."
          ],
          [
            "name" => "Drop-off",
            "description" => "There are several shops that accept used oils. Check out our map to find places where you can drop them off!"
          ]
        ]
      ],
      [
				"name" => "Cotton pad",
				"category" => "Households",
        "description" => "",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "DIY Compost",
            "description" => "Organic materials such as food scraps, leaves, paper and plants are readily compostable in a home compost pile. Make sure that the organics are free from produce stickers and packaging.\n\nIt is possible to create your own compost pile or bin."
          ],
          [
            "name" => "Landfill",
            "description" => "These items are usually not accepted in your 'Recycle' bin, so if other listed options do not work for you, the only one left is the 'Landfill' bin.\n\n Place materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic materials in your black 'Landfill' bin."
          ]
        ]
      ],
      [
				"name" => "Dental floss",
				"category" => "Households",
        "description" => "",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Landfill",
            "description" => "These items are usually not accepted in your 'Recycle' bin, so if other listed options do not work for you, the only one left is the 'Landfill' bin.\n\n Place materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic materials in your black 'Landfill' bin."
          ]
        ]
      ],
      [
				"name" => "Diaper",
				"category" => "Households",
        "description" => "The generation of diapers totaled to over 4 million tons in 2017, and 80% of it was landfilled.\n\nDiapers recycling is relatively new and not widely available yet.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Landfill",
            "description" => "These items are usually not accepted in your 'Recycle' bin, so if other listed options do not work for you, the only one left is the 'Landfill' bin.\n\n Place materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic materials in your black 'Landfill' bin."
          ]
        ]
      ],
      [
				"name" => "Disposable paper dishware",
				"category" => "Paper",
        "description" => "The generation of paper plates and cups totaled to over 1.5 million tons in 2017.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reduce",
            "description" => "The best option for any disposable food or beverage container is to reduce its consumption when possible. Try using metal dishwares for longer usage."
          ],
          [
            "name" => "Landfill",
            "description" => "These items are usually not accepted in your 'Recycle' bin, so if other listed options do not work for you, the only one left is the 'Landfill' bin.\n\n Place materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic materials in your black 'Landfill' bin."
          ]
        ]
      ],
      [
				"name" => "Disposable plastic bottle/Container",
				"category" => "Plastic",
        "description" => "Disposable plastic bottle or containers are usually made of plastic#1 (PET) and plastic#2 (HDPE) and are often recycled. These items can range from mineral bottles, carbonated bottles, milk bottles, shampoo/detergent bottles and various plastic containers. These items usually have a recycle number on it and only plastic#1 (PET), plastic#2 (HDPE) and plastic#5 (PP) are accepted for recycling. The generation of plastic bottles totaled to 3.7 million tons in 2017, and less than 30% of it was recycled.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reduce",
            "description" => "Bring along your own refillable bottle instead of purchasing single-use bottles. You can even make your own sports drinks if hydrating for exercise is what you're looking for."
          ],
          [
            "name" => "Reuse",
            "description" => "There are dozens if not hundres of ways you can reuse plastic bottles/containers in wide range of DIY projects. Search online to find out more!"
          ],
          [
            "name" => "Recycle",
            "description" => "Leave cap on.\n\nMake sure it is not biodegradable plastic (must be labeled 'biodegerabled') or compostable plastic (must be labeled 'compostable') - those plastics are not recyclable.\n\nA lot of recyclables end up at landfills because of food contamination. Make sure your recyclables contain no residual food debris. Give food and beverage containers a light rinse if necessary.\n\nRecycling must be loose (free of a plastic bag), clean, empty and dry."
          ],
        ]
      ],
      [
				"name" => "Take-away plastic container",
				"category" => "Plastic",
        "description" => "Take-away plastic containers are usually made of plastic#5 (PP) are often recycled. These items usually have a recycle number on it and only plastic#1 (PET), plastic#2 (HDPE) and plastic#5 (PP) are accepted for recycling. Containers made of styrofoam (plastic#6 | PS) are usually not accepted for recycling and designated for landfill.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reduce",
            "description" => "The best option is to bring your own tupperware for take-away to reduce the amount of take-aways plastic containers."
          ],
          [
            "name" => "Recycle",
            "description" => "Make sure it is not an expanded polystrene foam (plastic#6 | PS) which is not recyclable.\n\nMake sure it is not biodegradable plastic (must be labeled 'biodegerabled') or compostable plastic (must be labeled 'compostable') - those plastics are not recyclable.\n\nA lot of recyclables end up at landfills because of food contamination. Make sure your recyclables contain no residual food debris. Give food and beverage containers a light rinse if necessary.\n\nRecycling must be loose (free of a plastic bag), clean, empty and dry."
          ],
        ]
      ],
      [
				"name" => "Disposable plastic dishware",
				"category" => "Plastic",
        "description" => "Disposable plastic take out boxes, clamshells, cups totaled to over 1 million tons in 2017, and over 80% of it was landfilled.\n\nDisposable plastic take out boxes, clamshells, cups and other food can be made of plastic#1 (PET), plastic#2 (HDPE) and plastic#5 (PP) and are often recycled by local recycling programs. Containers made of expanded polystrene foam (plastic#6 | PS) are usually not accepted for recycling and designated for landfill.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reduce",
            "description" => "The best option for any disposable food or beverage container is to reduce its consumption when possible."
          ],
          [
            "name" => "Recycle",
            "description" => "Make sure it is not an expanded polystrene foam (plastic#6 | PS) which is not recyclable.\n\nMake sure it is not biodegradable plastic (must be labeled 'biodegerabled') or compostable plastic (must be labeled 'compostable') - those plastics are not recyclable."
          ],
        ]
      ],
      [
				"name" => "Envelope",
				"category" => "Paper",
        "description" => "From business correspondence to birthday cards and junk mail, paper envelopes can seem to be constantly appearing and adding to what is sent to landfills every year.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reduce",
            "description" => "Go Paperless\n\nChoose paperless billing for when you can pay bills online or through any other means than mailing in a check. With all the 'Terms of Service' updates and monthly statements, you'll be surprised how many envelopes this adds up to.\n\nOpt-Out\n\nTake steps to stop receiving junk mail. From catalogues to politcal mailer, credit card and insurance offers, there are programs to reduce the junk mail sent to you and some last for up to 10 years!"
          ],
          [
            "name" => "Recycle",
            "description" => "Ensure the envelop is dry, as wet paper fibers can't be recycled, You don't have to remove the clear plastic address window, but it doesn't hurt to remove it first either. Then simply toss it in the recycle bin."
          ],
        ]
      ],
      [
				"name" => "Styrofoam dishware",
				"category" => "Plastic",
        "description" => "Expanded polystrene, also known by the trademarked brand name Styrofoam, is a type of plastic, so it may take as many as 500 years to decompose in the landfill.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reduce",
            "description" => "Because expanded polystrene is a plsatic which usually ends up at landfills, best practice is to reuse your existing expanded polystrene items and avoid additional purchases."
          ],
          [
            "name" => "Reuse",
            "description" => "There are many options for reusing items made of expanded polystrene, you can find various guides online."
          ],
          [
            "name" => "Landfill",
            "description" => "Contain the smaller pieces in a bag so that it doesn't break apart into pieces that an animal may confuse as food and consume."
          ],
        ]
      ],
      [
				"name" => "Styrofoam box",
				"category" => "Plastic",
        "description" => "Expanded polystrene, also known by the trademarked brand name Styrofoam, is a type of plastic, so it may take as many as 500 years to decompose in the landfill.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reduce",
            "description" => "Because expanded polystrene is a plsatic which usually ends up at landfills, best practice is to reuse your existing expanded polystrene items and avoid additional purchases."
          ],
          [
            "name" => "Reuse",
            "description" => "There are many options for reusing items made of expanded polystrene, you can find various guides online."
          ],
          [
            "name" => "Landfill",
            "description" => "Contain the smaller pieces in a bag so that it doesn't break apart into pieces that an animal may confuse as food and consume."
          ],
        ]
      ],
      [
				"name" => "Feminine hygiene product",
				"category" => "Households",
        "description" => "",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Landfill",
            "description" => "Only place materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic materials in your landfill bin."
          ],
        ]
			],
      [
				"name" => "Fire extinguisher",
				"category" => "Hazardous",
        "description" => "",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "The majority of fire extinguishers can be recharged after use if not damaged or expired. It is important to check the label of the fire extinguisher, so you know if the one you have is re-usable or not. Re-pinning and rechargin must be done by a professional."
          ],
        ]
      ],
      [
				"name" => "Flammables",
				"category" => "Hazardous",
        "description" => "It is illegal to put items such as electronics, batteries, fluorescent bulbs, pesticides and other hazardous waste chemicals into any of your recycling bins. These items are not recyclable, compostable or allowed in landfills.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Drop-off",
            "description" => "Many household items that are considered hazardous waste are still recyclable, such as medical sharps, fluorescent light bulbs, batteries, cooking oil and paint. All you need to do is take these items to a recycling center that accepts them, which can be closer than you think."
          ],
        ]
      ],
      [
				"name" => "Fluorescent bulb",
				"category" => "Hazardous",
        "description" => "While CFL light bulbs last up to 10 times longer and use up 75% less energy than traditional incandescent light bulbs, each CFL contains 4 milligrams of mercury, which is harmless when the bulk is intact but potentially toxic if the bulb breaks in a landfill and enters the water stream, that is why properly disposing of fluorescent lightbulbs is important for the environment.\n\nPack light bulbs carefully, so they don't break in transit.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Drop-off",
            "description" => "Several shops may accept fluorescent bulbs. Check out our map to find places where you can drop them off!"
          ],
        ]
      ],
      [
				"name" => "Foam rubber",
				"category" => "Hazardous",
        "description" => "",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "Foam rubber can be reused as packaging material for fragile items storage and other purposes."
          ],
          [
            "name" => "Landfill",
            "description" => "Just like styrofoam, foam rubber is usually not recycled and send to landfill."
          ],
        ]
      ],
      [
				"name" => "Glass beverage bottle",
				"category" => "Glass",
        "description" => "The generation of glass containers such as beer and soft drink bottles, wine and liquor bottles, as well as bottles and jars for food, juices, cosmetics and other products was almost 9 million tons in 2017, but only 1/3 of this amount was recycled.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reduce",
            "description" => "Bring your own refillable bottle instead of purchasing single-use bottles or cans. You can even make your own sports drinks if hydrating for exercise is what you're looking for."
          ],
          [
            "name" => "Recycle",
            "description" => "A lot of recyclables end up at landfills because of food contamination. Make sure your recyclables contain no residual food debris. Give food and beverage containers a light rinse if necessary.\nRecycling must be loose(free of a plastic bag), clean, empty and dry."
          ]
        ]
      ],
      [
				"name" => "Glass cup",
				"category" => "Glass",
        "description" => "The generation of glass containers such as beer and soft drink bottles, wine and liquor bottles, as well as bottles and jars for food, juices, cosmetics and other products was almost 9 million tons in 2017, but only 1/3 of this amount was recycled.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Recycle",
            "description" => "A lot of recyclables end up at landfills because of food contamination. Make sure your recyclables contain no residual food debris. Give food and beverage containers a light rinse if necessary.\nRecycling must be loose(free of a plastic bag), clean, empty and dry."
          ]
        ]
      ],
      [
				"name" => "Glass jar",
				"category" => "Glass",
        "description" => "The generation of glass containers such as beer and soft drink bottles, wine and liquor bottles, as well as bottles and jars for food, juices, cosmetics and other products was almost 9 million tons in 2017, but only 1/3 of this amount was recycled.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Recycle",
            "description" => "A lot of recyclables end up at landfills because of food contamination. Make sure your recyclables contain no residual food debris. Give food and beverage containers a light rinse if necessary.\nRecycling must be loose(free of a plastic bag), clean, empty and dry."
          ]
        ]
      ],
      [
				"name" => "Glass tableware",
				"category" => "Glass",
        "description" => "",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Drop-off",
            "description" => "Check out our map to find places where you can drop them off!"
          ],
          [
            "name" => "Recycle",
            "description" => "A lot of recyclables end up at landfills because of food contamination. Make sure your recyclables contain no residual food debris. Give food and beverage containers a light rinse if necessary.\nRecycling must be loose(free of a plastic bag), clean, empty and dry."
          ]
        ]
      ],
      [
				"name" => "Glass window",
				"category" => "Glass",
        "description" => "",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Drop-off",
            "description" => "Check out our map to find places where you can drop them off!"
          ],
          [
            "name" => "Recycle",
            "description" => "A lot of recyclables end up at landfills because of food contamination. Make sure your recyclables contain no residual food debris. Give food and beverage containers a light rinse if necessary.\nRecycling must be loose(free of a plastic bag), clean, empty and dry."
          ]
        ]
      ],
      [
				"name" => "Glasses",
				"category" => "Glass",
        "description" => "",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "You can sell, gift or dondate your unwanted glasses or sunglasses in good condition. Some shops accept glasses in good condition as donations and distribute them worldwide to children and adults in need."
          ],
          [
            "name" => "Drop-off",
            "description" => "Check out our map to find places where you can drop them off!"
          ],
          [
            "name" => "Landfill",
            "description" => "Mixed materials items such as glasses are usually not accepted by recycling programs."
          ],
        ]
      ],
      [
				"name" => "Halogen bulb",
				"category" => "Hazardous",
        "description" => "With a variety of light bulb types with some containing hazardous materials and different locations having different regulatons on proper disposal. It is no surprise that it can be difficult to know where or how to recycle lightbulbs",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Drop-off",
            "description" => "Several shops may accept fluorescent bulbs. Check out our map to find places where you can drop them off!"
          ],
        ]
      ],
      [
				"name" => "Hardcover book",
				"category" => "Paper",
        "description" => "Keeping books out of landfills is important. For each ton of paper recycled, 3 cubic yards of landfill space, 380 gallons of oil, 17 trees, 4000 kilowatts of energy, and 7000 gallons of water are saved!",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "Donate\n\nConsider donating to your local library, school or send the book on a journey by donating it to organizations that gather books for communities.\n\nGift it\n\nIf you enjoyed the book, consider gifting it to someone you know.\n\nRepurpose it\n\nTransform your book into something entirely new. Search online for various ways to repurpose them!"
          ],
          [
            "name" => "Recycle",
            "description" => "Glossy paper is okay.\n\nMake sure your paper items are clean, unsolied and dry. Wet or dirty paper is not acceptable for recycling but can be composted if this option is available to you.\n\nRecycling must be loose (free of a plastic bag), clean, empty and dry."
          ],
        ]
      ],
      [
				"name" => "Ink catridge",
				"category" => "Hazardous",
        "description" => "",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Dropoff",
            "description" => "Several shops may accept ink catridge and provide refillables for them. Check out our map to find places where you can drop them off!"
          ]
        ]
      ],
      [
				"name" => "Lighter",
				"category" => "Hazardous",
        "description" => "",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reduce",
            "description" => "Consider investing in a rechargable lighter."
          ],
          [
            "name" => "Landfill",
            "description" => "Only place materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic materials in your landfill bin."
          ]
        ]
      ],
      [
				"name" => "Mattress",
				"category" => "Households",
        "description" => "It's estimated that 50,000 mattresses a day ending up in landfills. Luckilk, 80% of the components in a mattress can be recycled, avoiding the landfill pileup. Some states require used mattresses to be recycled and more are considering similar products.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "A mattress can be costly expense or a much appreciated gift. If you know someone going off to college or who will graduating college and moving away, your mattress may be a much appreciated gift.\n\nDonate\n\nA lot of bulky household items including but not limited to appliances or kitchenware can be sold or donated. Bulky items picked up by your garbage collection service often end up at landfills with no chance for a second life."
          ],
          [
            "name" => "Retailer take back",
            "description" => "If you need to get rid of a mattress because you are purchasing a new one, ask the retailer if they can collect your old mattress. You can also contact them and ask if they will take it back."
          ]
        ]
      ],
      [
				"name" => "Metal beverage bottle",
				"category" => "Metal",
        "description" => "The generation of steel food cans, general purpose cans and other steel packaging, totaled 2 million tons in 2017 and almost 3/4 of this material was recycled.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "Sell, gift or donate if in good condition."
          ],
          [
            "name" => "Recycle",
            "description" => "A lot of recyclables end up at landfills because of food contamination. Make sure your recyclables contain no residual food debris. Give food and beverage containers a light rinse if necessary.\nRecycling must be loose(free of a plastic bag), clean, empty and dry."
          ]
        ]
      ],
      [
				"name" => "Metal bucket",
				"category" => "Metal",
        "description" => "The generation of steel food cans, general purpose cans and other steel packaging, totaled 2 million tons in 2017 and almost 3/4 of this material was recycled.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Recycle",
            "description" => "Various metal household containers are usually recyclable if not mixed with other materials.\n\nRecycling must be loose(free of a plastic bag), clean, empty and dry."
          ]
        ]
      ],
      [
				"name" => "Metal hanger",
				"category" => "Metal",
        "description" => "Metal hangers made of metal wire are not welcomed at many MRFs (materials recovery facilities) because they can jam the machinery due to their shape. So if not reused or recycled as scrap metal, the only option for metal hangars is landfill",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "Reuse at home along with other hangers or return to the dry cleaning.\n\nMetal hangers are made of metal wire can be reused in many different ways at your home: from fixing all kinds of things at your home to crafting."
          ],
          [
            "name" => "Landfill",
            "description" => "Throw it in the 'landfill' bin if the other options are not available to you. Only place materials that cannot be reused, recycled or composted and that do not contain hazardous or toxic materials in your landfill bin."
          ]
        ]
      ],
      [
				"name" => "Metal thermos",
				"category" => "Metal",
        "description" => "The generation of steel food cans, general purpose cans and other steel packaging, totaled 2 million tons in 2017 and almost 3/4 of this material was recycled.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "Sell, gift or donate if in good condition."
          ],
          [
            "name" => "Drop-off",
            "description" => "Metal thermos without any other materials can often be recycled as scrap metal, check if there is any scrap yard near you. Scrap metal is not acceptad in your bins."
          ]
        ]
      ],
      [
				"name" => "Monitor",
				"category" => "Electronics",
        "description" => "Many component of electronice equipment contain metals, plastic and glass that can be recycled at special facilities, while others may present environmental hazards if not managed correctly: electronice wastes can have circuitry that contain toxic heavy metals such as mecury, lead, cadmium, zinc and nickel that can pollute ground water and hard public health if not managed properly.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "Sell, gift or donate if in good condition."
          ],
          [
            "name" => "Drop-off",
            "description" => "Several shops accepts electronic waste. Check out our map to find places where you can drop them off!"
          ]
        ]
      ],
      [
				"name" => "Multi-use plastic beverage bottle",
				"category" => "Plastic",
        "description" => "Do check the plastic type of your multi-use plastic bottle as it may be mixed with other materials. Search for the triangle sign with a number inside. If it is not mixed with other materials, it might be accepted in the recycle bin.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "Sell, gift or donate if in good condition."
          ],
          [
            "name" => "Recycle",
            "description" => "A lot of recyclables end up at landfills because of food contamination. Make sure your recyclables contain no residual food debris. Give food and beverage containers a light rinse if necessary.\nRecycling must be loose(free of a plastic bag), clean, empty and dry."
          ]
        ]
      ],
      [
				"name" => "Newspaper",
				"category" => "Paper",
        "description" => "The generation of newspapers and other mechanical papers totaled to almost 5.5 million tons in 2017.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "Newspaper can be reused as packaging material for fragile item storage, crafting and many other purposes."
          ],
          [
            "name" => "Recycle",
            "description" => "First, remove any plastic wrapping and then simply toss into your curbside recycling bin.\n\nMake sure your paper items are clean, unsolied and dry. Wet or dirty paper is not acceptable for recycling but can be composted if this option is available to you.\n\nRecycling must be loose (free of a plastic bag), clean, empty and dry."
          ]
        ]
      ],
      [
				"name" => "Paper bag",
				"category" => "Paper",
        "description" => "The generation of aseptic and folding cartons, paper bags, wrapping paper and other paper totaled to 8.5 million tons in 2017 and over 2/3 of it was landfilled.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "Paper bags can be reused for shopping, storage and other purposes."
          ],
          [
            "name" => "Recycle",
            "description" => "Make sure your paper items are clean, unsolied and dry. Wet or dirty paper is not acceptable for recycling but can be composted if this option is available to you.\n\nRecycling must be loose (free of a plastic bag), clean, empty and dry."
          ]
        ]
      ],
      [
				"name" => "Paper cup",
				"category" => "Paper",
        "description" => "Paper cups are usually coated in plastic and often can't be recycled. The generation of paper plates and cups totaled to almost 1.5 million tons in 2017.",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "Take along your own cup or mug to work or even to the coffee shop.Some places offer a discount for using your own mug."
          ],
          [
            "name" => "Recycle",
            "description" => "A lot of recyclables end up at landfills because of food contamination. Make sure your paper items are clean, unsolied and dry. Wet or dirty paper is not acceptable for recycling but can be composted if this option is available to you.\n\nRecycling must be loose (free of a plastic bag), clean, empty and dry."
          ]
        ]
      ],
      [
				"name" => "Paper napkin",
				"category" => "Paper",
        "description" => "The generation of tissue paper and towels totaled to over 3.5 million tons in 2017.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "DIY Compost",
            "description" => "Plain paper that has become dirty such as paper towels and napkins can be added to your home compost pile. Be sure to avoid any paper that is glossy, heavily inked or covered in plastic such as paper coffee cups, juice cartons or take-out boxes."
          ],
        ]
      ],
      [
				"name" => "Pesticides",
				"category" => "Hazardous",
        "description" => "Do not pour leftover pesticides down the sink, into the toilet, or down a sewer or street drain. Pesticides may interfere with the operation of wastewater treatment systems or pollute waterways. Many muncipal systems are not equipped to remove all pesticide residues. If pesticides reach waterways, they may harm fish, plants and other living things.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Drop-off",
            "description" => "Many household items that are considered hazardous waste are still recyclable, such as medical sharps, fluorescent light bulbs, batteries, cooking oil and paint. All you need to do is take these items to a recycling center that accepts them, which can be closer than you think."
          ]
        ]
      ],
      [
				"name" => "Pizza box",
				"category" => "Paper",
        "description" => "Pizza box belongs to several bins simultaneously. The clean top belongs to the recycle bin and the greasy bottom part should be either composted or landfilled. The greasy bottom cannot be recycled because at some point when paper is recycled, it is mixed with water to create 'slurry' or 'pulp', and dirty paper contaminates the process with oils and other substances, so it is not recyclable",
        "recyclable" => "Yes",
        "contents" => [
          [
            "name" => "Recycle",
            "description" => "THe top and sides of a pizza box can be seperated and recycled along with other cardboard, if clean and free of grease. The greasy bottom should be composted if possible. The last option should be place it in the landfill bin.\n\nBreak and flatten boxes and other paper items with hollow space before putting them into your recycle bin.\n\nA lot of recyclables end up at landfills because of food contamination."
          ]
        ]
      ],
      [
				"name" => "Plastic bag",
				"category" => "Plastic",
        "description" => "Plastic bags, wraps and other items made of soft plastic film are usually made of low-density (plastic#4) and are not accepted for recycling. However, several grocery stores may collect them for reusing.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reduce",
            "description" => "Avoid getting another plastic bag by reusing existing ones you have or carrying a reusable bag for shopping."
          ],
          [
            "name" => "Reuse",
            "description" => "Put your existing plastic bag to use and avoid taking home new ones. Below are a few popular ways to reuse the bags you already have.\n\nReuse it\n\nThe typical plastic bag is only used for an average of 12 minutes, but you can extend its lifetime by using it in any of the following ways:line a small trash can, carry clothes to/from the gym, use as a lunch bag or clean up after your pet.\n\nPacking material\n\nInstead of buying all sorts of packing material, save used plastic bags to wrap and protect fragile items when you move."
          ]
        ]
      ],
      [
				"name" => "Refrigerator",
				"category" => "Electronics",
        "description" => "Many components of electronic equipment contain metals, plastic and glass that can be recycled at special facilities, while others may present environmental hazards if not managed correctly.\n\nElectronic waste can have circuitry that contain toxic heavy metals such as mercury, lead, cadmium, zinc and nickel that can pollute groundwater and harm public health if not properly managed.",
        "recyclable" => "No",
        "contents" => [
          [
            "name" => "Reuse",
            "description" => "A lot of bulky household items including but not limited to appliances or kitchenware can be sold or donated. Bulky items picked up by your garbage collection service often end up at landfills with no chance for a second life."
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
