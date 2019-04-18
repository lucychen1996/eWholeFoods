use eWholeFoods;

insert into products (item_name, current_stock_quantity, price, nutrition_facts, unit, category, image) 
	values ('Strawberries', 50, 3.49, 'Calories: 53, Total fat: 0.50 g, Protein: 1.11 g, Carbohydrates: 12.75 g, Sugar: 8.12 g, Calcium: 27 milligrams (mg) (2.7 percent DV), Iron: 0.68 mg (3.8 percent DV), Magnesium: 22 mg (5.5 percent DV), Potassium: 254 mg (5.4 percent DV), Vitamin A: 20 international units (0.4 percent DV), Vitamin C: 97.6 mg (162.6 percent DV), Vitamin K: 3.7 mg (4.6 percent DV)', 'lb', 'Fruit','strawberries.jpg');

insert into products (item_name, current_stock_quantity, price, nutrition_facts, unit, category,image)
	values ('Romaine Lettuce', 75, 2.50, 'Calories: 8, Carbohydrates: 1.5 g, Fiber: 1 g, Protein: 0.6 g, Total fat: 0.1 g', 'lb','Vegetable','romaine.jpg');

insert into products (item_name, current_stock_quantity, price, nutrition_facts, unit, category,image)
	values ('Potatoes', 125, 5.97, 'Calories: 110, Total fat: 0 g, Cholesterol: 0 mg, Sodium: 0 mg, Carbohydrates: 26 g, Protein: 3 g, Potassium: 620 mg', 'unit', 'Vegetable','potatoes.jpg');

insert into products (item_name, current_stock_quantity, price, nutrition_facts, unit,category,image)
	values ('Chicken Breast', 25, 3.21, 'Calories: 102, Total fat: 2 g, Cholesterol: 53 mg, Sodium: 46 mg, Potassium: 46 mg, Carbohydrates: 0 g, Protein: 19 g', 'lb','Meat','chicken.jpg');

insert into products (item_name, current_stock_quantity, price, nutrition_facts, unit,category,image)
	values ('White Rice', 20, 19.99, 'Calories: 170, Total fat: 0 g, Cholesterol: 0 g, Sodium: 0 g, Carbohydrates: 39 mg, Protein: 3 g', 'unit','Grain','whiterice.jpg');
	
insert into categories (category_name)
	values ('Fruit');
insert into categories (category_name)
	values ('Vegetable');
insert into categories (category_name)
	values ('Meat');
insert into categories (category_name)
	values ('Dairy');
insert into categories (category_name)
	values ('Grain');
insert into categories (category_name)
	values ('Frozen');
insert into categories (category_name)
	values ('Beverage');
insert into categories (category_name)
	values ('Bakery');
insert into categories (category_name)
	values ('Snacks');