CREATE DATABASE patisserie;
USE patisserie;

CREATE TABLE PlanSuscripcion (
  idPlan INT PRIMARY KEY,
  nombrePlan VARCHAR(255),
  precio INT,
  ventajasPlan VARCHAR(255)
);

CREATE TABLE Usuario (
  idUsuario INT PRIMARY KEY,
  email VARCHAR(50),
  nombre VARCHAR(50),
  apellido VARCHAR(50),
  contrasena VARCHAR(50),
  tipoUsuario VARCHAR(50),
  idPlan INT,
  FOREIGN KEY (idPlan) REFERENCES PlanSuscripcion(idPlan)
);

CREATE TABLE Receta (
  idReceta INT PRIMARY KEY,
  idAutor INT,
  nombre VARCHAR(50),
  urlImagen VARCHAR(255),
  urlVideo VARCHAR(255),
  descripcion VARCHAR(255),
  preparacion VARCHAR(255),
  FOREIGN KEY (idAutor) REFERENCES Usuario(idUsuario)
);

CREATE TABLE Ingrediente (
  idIngrediente INT PRIMARY KEY,
  nombre VARCHAR(50)
);

CREATE TABLE RecetaIngrediente (
  idReceta INT,
  idIngrediente INT,
  cantidad INT,
  PRIMARY KEY (idReceta, idIngrediente),
  FOREIGN KEY (idReceta) REFERENCES Receta(idReceta),
  FOREIGN KEY (idIngrediente) REFERENCES Ingrediente(idIngrediente)
);

CREATE TABLE Valoracion (
  idCliente INT,
  idReceta INT,
  comentario VARCHAR(255),
  puntuacion INT,
  PRIMARY KEY (idCliente, idReceta),
  FOREIGN KEY (idCliente) REFERENCES Usuario(idUsuario),
  FOREIGN KEY (idReceta) REFERENCES Receta(idReceta)
);

CREATE TABLE PlanRecetas (
  idPlan INT,
  idReceta INT,
  PRIMARY KEY (idPlan, idReceta),
  FOREIGN KEY (idPlan) REFERENCES PlanSuscripcion(idPlan),
  FOREIGN KEY (idReceta) REFERENCES Receta(idReceta)
);

-- Insertar datos en la tabla PlanSuscripcion
INSERT INTO PlanSuscripcion (idPlan, nombrePlan, precio, ventajasPlan)
VALUES
  (1, 'Básico', 10, 'Acceso a recetas básicas'),
  (2, 'Premium', 20, 'Acceso a recetas premium y videos exclusivos'),
  (3, 'VIP', 30, 'Acceso ilimitado a todas las recetas y beneficios especiales');

-- Insertar datos en la tabla Usuario (clientes)
INSERT INTO Usuario (idUsuario, email, nombre, apellido, contrasena, tipoUsuario, idPlan)
VALUES
  (1, 'cliente1@example.com', 'Cliente', 'Uno', 'password1', 'Cliente', 1),
  (2, 'cliente2@example.com', 'Cliente', 'Dos', 'password2', 'Cliente', 2),
  (3, 'cliente3@example.com', 'Cliente', 'Tres', 'password3', 'Cliente', 2),
  (4, 'cliente4@example.com', 'Cliente', 'Cuatro', 'password4', 'Cliente', 3),
  (5, 'cliente5@example.com', 'Cliente', 'Cinco', 'password5', 'Cliente', 3);

-- Insertar datos en la tabla Usuario (autor)
INSERT INTO Usuario (idUsuario, email, nombre, apellido, contrasena, tipoUsuario, idPlan)
VALUES
  (6, 'autor@example.com', 'Autor', 'Principal', 'password', 'Autor', 3);

-- Insertar datos en la tabla Receta
INSERT INTO Receta (idReceta, idAutor, nombre, urlImagen, urlVideo, descripcion, preparacion)
VALUES
(1, 6, 'Cupcakes de chocolate', 'https://www.infinitiaresearch.com/wp-content/uploads/2021/01/1-12.png', 'video1.mp4', 'Pequeños pasteles esponjosos de chocolate cubiertos con una suave crema de mantequilla o glaseado. Son deliciosos y se pueden decorar con sprinkles o cualquier otro topping creativo.', 'Pasos de preparación de la receta 1'),
(2, 6, 'Muffins de arándanos', 'https://www.recetassinlactosa.com/wp-content/uploads/2017/12/Muffins-de-ar%C3%A1ndanos.jpg', 'video2.mp4', 'Jugosos muffins con trozos de arándanos frescos que explotan en cada mordisco. Su textura esponjosa y su sabor dulce-agrio los hacen perfectos para acompañar una taza de té o café.', 'Pasos de preparación de la receta 2'),
(3, 6, 'Pudín de pan', 'https://www.recetasderechupete.com/wp-content/uploads/2020/11/Pudin-de-pan-casero-2.jpg', 'video3.mp4', 'Un clásico postre hecho con pan remojado en una mezcla dulce de leche, huevos y especias. Al hornearse, se forma una capa crujiente por fuera y un interior suave y cremoso. Se puede servir caliente o frío.', 'Pasos de preparación de la receta 3'),
(4, 6, 'Berlinas', 'https://cecotec.es/recetas/wp-content/uploads/2019/06/Mambo-berlinas.jpg', 'video4.mp4', 'Deliciosos bollos esponjosos y dorados, rellenos de crema pastelera y cubiertos de azúcar glas. Un dulce perfecto para disfrutar en el desayuno o la merienda.', 'Pasos de preparación de la receta 4'),
(5, 6, 'Palmeritas de hojaldre', 'https://cocinaabuenashoras.com/files/palmeritas-de-hojaldre-muy-cerca-16-9.jpeg', 'video5.mp4', 'Crujientes y doradas palmeritas hechas de hojaldre y azúcar. Son un dulce sencillo pero irresistible, perfecto para disfrutar con un café o té y compartir con amigos y familiares.', 'Pasos de preparación de la receta 5'),
(6, 6, 'Pastel de zanahoria', 'https://www.danone.es/wp-content/uploads/2022/03/COMI15-1280x853.jpg', 'video6.mp4', 'Un bizcocho húmedo y aromático lleno de zanahorias ralladas, nueces y especias como canela y jengibre. Cubierto con un glaseado de queso crema, es un postre irresistible que combina lo dulce y lo saludable.', '1. Precalentar el horno a 180°C. 2. Mezclar los ingredientes secos en un tazón. 3. Agregar los ingredientes líquidos y mezclar bien. 4. Verter la mezcla en un molde para pastel. 5. Hornear durante 45 minutos o hasta que esté dorado.'),
(7, 6, 'Tiramisú', 'https://img2.rtve.es/i/?w=1600&i=1635859279860.jpg', 'video7.mp4', 'Un postre italiano decadente y delicioso con capas alternas de bizcochos de soletilla empapados en café, crema de mascarpone y cacao en polvo. Es suave, cremoso y lleno de sabor a café, convirtiéndolo en un clásico irresistible en cualquier ocasión.', '1. Preparar el café y dejar enfriar. 2. Batir las yemas de huevo con el azúcar hasta que estén cremosas. 3. Agregar el queso mascarpone y batir hasta que esté suave. 4. Montar las claras a punto de nieve. 5. Mezclar las claras con la mezcla de yemas y mas'),
(8, 6, 'Cupcakes de vainilla', 'https://www.deliciosi.com/images/0/4/cupcakes-vainilla-original.jpg', 'video8.mp4', 'Deliciosos mini pasteles de vainilla suaves y esponjosos, decorados con una variedad de frostings y decoraciones. Son perfectos para fiestas y celebraciones, y se pueden personalizar según los gustos individuales.', '1. Precalentar el horno a 180°C. 2. Batir la mantequilla con el azúcar hasta que esté suave. 3. Agregar los huevos y batir bien. 4. Agregar la harina y la vainilla y mezclar hasta que estén incorporados. 5. Colocar la masa en moldes para cupcakes. 6. Horn'),
(9, 6, 'Tarta de fresas', 'https://i.ytimg.com/vi/Yp0jMURMXgk/maxresdefault.jpg', 'video9.mp4', 'Una tarta fresca y vibrante con una base crujiente de masa quebrada, rellena con crema pastelera y cubierta con fresas frescas. Es una delicia visual y su sabor dulce y afrutado la convierte en un postre perfecto para la primavera o el verano.', '1. Precalentar el horno a 180 grados...'),
(10, 6, 'Profiteroles', 'https://i.blogs.es/de2f7d/profiteroles/840_560.jpg', 'video10.mp4', 'Delicados y ligeros bocados de masa de choux rellenos de crema pastelera y bañados en chocolate. Estos pequeños pasteles son elegantes y deliciosos, perfectos para una ocasión especial o como dulce tentempié.', '1. Precalentar el horno a 180 grados...'),
(11, 6, 'Muffins de calabaza ', 'https://img.cocinarico.es/2020-04/muffins-de-calabaza-1.jpg', 'video11.mp4', ' Deliciosos muffins con un suave sabor a calabaza y especias cálidas como canela y nuez moscada. Son una opción perfecta para el otoño, y su aroma acogedor llenará tu hogar mientras se hornean.', '1. Batir las yemas con el azúcar...'),
(12, 6, 'Hojaldres rellenos de crema', 'https://cdn.elcocinerocasero.com/imagen/receta/1000/2022-06-09-11-15-21/miguelitos-de-crema.jpeg', 'video12.mp4', ' Deliciosos pastelitos de hojaldre crujiente rellenos de crema pastelera suave y dulce. Son irresistibles y se pueden disfrutar en el desayuno o como un dulce capricho a lo largo del día.', '1. Precalentar el horno a 180 grados...'),
(13, 6, 'Galletas de mantequilla', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwHCpqj1Hejj9t8fdCoMMz3X5UDyzwkttYSw&usqp=CAU', 'video13.mp4', ' Clásicas galletas de mantequilla, ligeras y sabrosas, con una textura delicada y un sutil aroma a vainilla. Son perfectas para cualquier ocasión y se pueden decorar con glaseado o azúcar.', '1. Batir la mantequilla con el azúcar...'),
(14, 6, 'Croissants', 'https://unareceta.com/wp-content/uploads/2016/10/croissant.jpg', 'video14.mp4', 'Deliciosos bollos de hojaldre crujientes por fuera y tiernos por dentro. Ideales para el desayuno o la merienda, se pueden rellenar con chocolate, mermelada o queso para añadir un toque extra de sabor.', '1. Precalentar el horno a 180 grados...'),
(15, 6, 'Magdalenas de chocolate', 'https://badun.nestle.es/imgserver/v1/80/1290x742/9263aaa652ff-madalenas-de-chocolate.jpg', 'video15.mp4', 'Deliciosas magdalenas esponjosas y llenas de sabor a chocolate. Perfectas para el desayuno o la merienda, su aroma y textura te transportarán a momentos de indulgencia.', '1. Precalentar el horno a 180 grados...'),
(16, 6, 'Tarta de queso y frutos del bosque', 'https://content-cocina.lecturas.com/medio/2018/07/19/tarta-de-frutas-rojas_1651eb6b_800x800.jpg', 'video16.mp4', 'Una tarta cremosa y suave con una base de galleta y un relleno de queso crema, decorada con una mezcla de frutos del bosque frescos. Es una combinación equilibrada de dulzura y acidez que deleitará tus papilas gustativas.', '1. Precalentar el horno a 180 grados...'),
(17, 6, 'Donuts caseros', 'https://cdn1.postres-caseros.com/recetas/donuts-caseros-y-faciles.JPG', 'video17.mp4', ' Irresistibles rosquillas fritas hechas en casa, cubiertas con azúcar glas, chocolate, glaseado o cualquier otro topping de tu elección. Son deliciosos y pueden disfrutarse en el desayuno o como dulce tentempié.', '1. Mezclar la harina con la levadura...'),
(18, 6, 'Éclairs', 'https://www.recetassinlactosa.com/wp-content/uploads/2015/10/%C3%89clairs-de-chocolate.jpg', 'video18.mp4', 'Exquisitos pasteles alargados de masa de choux rellenos de crema pastelera y cubiertos con una suave capa de chocolate. Son elegantes y deliciosos, perfectos para disfrutar con una taza de café.', '1. Precalentar el horno a 180 grados...'),
(19, 6, 'Macarons', 'https://www.hogarmania.com/archivos/201111/macarons-668x400x80xX.jpg', 'video19.mp4', 'Pequeños y coloridos bocados dulces hechos con almendras molidas, azúcar y clara de huevo. Con su textura suave y rellenos de una variedad de sabores, como frutas o cremas, son perfectos para deleitar el paladar.', '1. Tamizar la almendra y el azúcar glass...'),
(20, 6, 'Crema catalana', 'https://www.quieropostre.com/wp-content/uploads/2020/11/crema-catalana-receta-tradicional-1.jpg', 'video20.mp4', ' Un postre clásico de Cataluña con una capa de caramelo crujiente sobre una suave crema de vainilla. Es irresistible y se quema ligeramente con una cuchara caliente para crear una textura única.', '1. Calentar la leche con la canela...'),
(21, 6, 'Bizcocho de limón', 'https://cocinaabuenashoras.com/files/bizcocho-de-yogur-de-limon-abierto.jpg', 'video21.mp4', 'Un bizcocho ligero y refrescante con un toque cítrico de limón. Su textura es suave y esponjosa, y su sabor equilibrado lo hace perfecto para cualquier ocasión.', '1. Precalentar el horno a 180 grados...'),
(22, 6, 'Tarta de manzana', 'https://imag.bonviveur.com/tarta-de-manzana.jpg', 'video22.mp4', 'Una tarta clásica con una base de masa quebrada y un relleno de manzanas tiernas y especias. Perfecta para el otoño, su aroma y sabor reconfortante hacen de esta tarta un postre irresistible para cualquier ocasión.', '1. Pelar y cortar las manzanas en cubos...'),
(23, 6, 'Brownies de chocolate', 'https://unareceta.com/wp-content/uploads/2014/11/brownie-de-chocolate.jpg', 'video23.mp4', 'Estos ricos y decadentes brownies son una delicia para los amantes del chocolate. Con su interior húmedo y su cobertura crujiente, son irresistibles para cualquier goloso.', '1. Precalentar el horno a 180 grados...'),
(24, 6, 'Magdalenas de naranja', 'https://okdiario.com/img/2018/05/05/receta-de-magdalenas-de-naranja-2.jpeg', 'video24.mp4', 'Magdalenas suaves y aromáticas con un toque cítrico de naranja. Ideales para disfrutar en cualquier momento del día, su sabor refrescante te conquistará desde el primer bocado.', '1. Precalentar el horno a 180 grados...'),
(25, 6, 'Tarta de ricotta ', 'https://imag.bonviveur.com/textura-de-la-tarta-de-ricota.jpg', 'video25.mp4', 'Una tarta ligera y delicada con un relleno de ricotta suave y aromático. Su textura esponjosa y su sabor suave hacen de esta tarta una opción elegante y versátil que puede disfrutarse tanto en ocasiones especiales como en reuniones informales.', '1. Mezclar la mantequilla con el azúcar...'),
(26, 6, 'Almojabanas con chocolate', 'https://cdn.colombia.com/gastronomia/2011/08/05/almojabanas-1570.gif', 'video26.mp4', 'Deliciosas bolitas de masa de maíz y queso rellenas de chocolate, perfectas para disfrutar como postre o merienda. Son crujientes por fuera y suaves por dentro.', '1. Precalentar el horno a 180 grados...'),
(27, 6, 'Tarta de zanahoria', 'https://www.annarecetasfaciles.com/files/tarta-de-zanahoria.jpg', 'video27.mp4', ' Un postre clásico con una base de bizcocho de zanahoria, relleno de crema de queso y cubierto con nueces picadas. Es una combinación irresistible de sabores y texturas que hacen de esta tarta un verdadero placer para los amantes de lo dulce.', '1. Precalentar el horno a 180 grados...'),
(28, 6, 'Coulant de chocolate', 'https://badun.nestle.es/imgserver/v1/80/1290x742/0f0bdd3d6059-coulant-de-chocolate-negro.jpg', 'video28.mp4', 'Un postre elegante y sorprendente, el coulant de chocolate es un bizcocho con un centro líquido de chocolate fundido. Al morderlo, el chocolate fluye, creando una experiencia deliciosa. Perfecto para impresionar a los invitados.', '1. Precalentar el horno a 200 grados...'),
(29, 6, 'Tarta de mango y coco', 'https://deliciaskitchen.b-cdn.net/wp-content/uploads/2021/07/tarta-fria-sin-horno-773x516.jpg', 'video29.mp4', 'Una combinación tropical de sabores en una tarta exquisita. Con una base de masa quebrada, un relleno suave y cremoso de mango y un toque de coco, esta tarta es refrescante y deliciosa, ideal para los amantes de los sabores tropicales.', '1. Precalentar el horno a 180 grados...'),
(30, 6, 'Galletas de chocolate y nueces', 'https://www.chocolatenegro.info/contenidos/imagenes/receta-de-galletas-de-nuez-y-chocolate.jpg', 'video30.mp4', 'Galletas crujientes y llenas de sabor, con trocitos de chocolate y nueces que se funden en cada bocado. Son ideales para acompañar con leche o disfrutar como merienda dulce.', '1. Mezclar la mantequilla con el azúcar...');

-- Insertar datos en la tabla Valoracion
INSERT INTO Valoracion (idCliente, idReceta, comentario, puntuacion)
VALUES
  (1, 1, 'Buena receta', 4),
  (2, 1, 'Me encantó', 5),
  (3, 2, 'Fácil de preparar', 4),
  (4, 3, 'Deliciosa', 5),
  (5, 4, 'Podría mejorar', 3);

-- Insertar datos en la tabla Ingrediente
INSERT INTO Ingrediente (idIngrediente, nombre)
VALUES
  (1, 'Harina'),
  (2, 'Azúcar'),
  (3, 'Huevos'),
  (4, 'Mantequilla'),
  (5, 'Leche'),
  (6, 'Chocolate'),
  (7, 'Fresas'),
  (8, 'Nueces'),
  (9, 'Levadura'),
  (10, 'Vainilla'),
  (11, 'Nueces picadas'),
  (12, 'Coco rallado'),
  (13, 'Fresas frescas'),
  (14, 'Crema de avellanas'),
  (15, 'Yogur natural'),
  (16, 'Queso crema'),
  (17, 'Azúcar moreno'),
  (18, 'Jengibre en polvo'),
  (19, 'Galletas de chocolate'),
  (20, 'Manzanas verdes'),
  (21, 'Mermelada de fresa'),
  (22, 'Crema chantilly'),
  (23, 'Frambuesas congeladas'),
  (24, 'Leche de coco'),
  (25, 'Pistachos picados'),
  (26, 'Frutas confitadas'),
  (27, 'Melocotones en almíbar'),
  (28, 'Jugo de limón'),
  (29, 'Avena en hojuelas'),
  (30, 'Malvaviscos miniatura'),
  (31, 'Azúcar glas'),
  (32, 'Azúcar moreno'),
  (33, 'Azúcar granulada'),
  (34, 'Harina de maíz'),
  (35, 'Harina de almendras'),
  (36, 'Harina de avena'),
  (37, 'Harina de coco'),
  (38, 'Harina de centeno'),
  (39, 'Mantequilla'),
  (40, 'Margarina'),
  (41, 'Chocolate blanco'),
  (42, 'Chocolate con leche'),
  (43, 'Chocolate para repostería'),
  (44, 'Leche entera'),
  (45, 'Leche descremada'),
  (46, 'Leche de almendras'),
  (47, 'Leche de soja'),
  (48, 'Levadura fresca'),
  (49, 'Levadura seca'),
  (50, 'Cacao en polvo'),
  (51, 'Extracto de vainilla'),
  (52, 'Esencia de almendra'),
  (53, 'Esencia de limón'),
  (54, 'Esencia de naranja'),
  (55, 'Esencia de coco'),
  (56, 'Huevos'),
  (57, 'Claras de huevo'),
  (58, 'Yemas de huevo'),
  (59, 'Crema de leche'),
  (60, 'Crema agria');
    

-- Insertar datos en la tabla RecetaIngrediente
INSERT INTO RecetaIngrediente (idReceta, idIngrediente, cantidad)
VALUES
	  (1, 1, 200),
	  (1, 2, 300),
	  (2, 3, 4),
	  (2, 4, 250),
	  (3, 5, 2),
	  (3, 6, 350),
	  (4, 7, 6),
	  (4, 8, 400),
	  (5, 9, 3),
	  (5, 10, 150),
	  (6, 11, 100),
	  (6, 12, 50),
	  (7, 13, 2),
	  (7, 14, 300),
	  (8, 15, 5),
	  (8, 16, 200),
	  (9, 17, 3),
	  (9, 18, 150),
	  (10, 19, 1),
	  (10, 20, 100),
	  (11, 21, 4),
	  (11, 22, 250),
	  (12, 23, 2),
	  (12, 24, 350),
	  (13, 25, 6),
	  (13, 26, 400),
	  (14, 27, 3),
	  (14, 28, 150),
	  (15, 29, 2),
	  (15, 30, 300),
	  (16, 31, 5),
	  (16, 32, 200),
	  (17, 33, 3),
	  (17, 34, 150),
	  (18, 35, 1),
	  (18, 36, 100),
	  (19, 37, 4),
	  (19, 38, 250),
	  (20, 39, 2),
	  (20, 40, 350),
	  (21, 41, 100),
	  (21, 42, 50),
	  (22, 43, 2),
	  (22, 44, 300),
	  (23, 45, 5),
	  (23, 46, 200),
	  (24, 47, 3),
	  (24, 48, 150),
	  (25, 49, 1),
	  (25, 50, 100),
	  (26, 51, 4),
	  (26, 52, 250),
	  (27, 53, 2),
	  (27, 54, 350),
	  (28, 55, 6),
	  (28, 56, 400),
	  (29, 57, 3),
	  (29, 58, 150),
	  (30, 59, 2),
	  (30, 60, 300);
  
-- Insertar datos en la tabla PlanRecetas
INSERT INTO PlanRecetas (idPlan, idReceta)
VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 4),
	(1, 5),
	(1, 6),
	(1, 7),
	(1, 8),
	(1, 9),
	(1, 10),
	(2, 11),
	(2, 12),
	(2, 13),
	(2, 14),
	(2, 15),
	(2, 16),
	(2, 17),
	(2, 18),
	(2, 19),
	(2, 20),
	(3, 21),
	(3, 22),
	(3, 23),
	(3, 24),
	(3, 25),
	(3, 26),
	(3, 27),
	(3, 28),
	(3, 29),
	(3, 30);