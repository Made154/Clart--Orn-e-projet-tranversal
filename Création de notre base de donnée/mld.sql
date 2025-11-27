-- -------------------------------------------- MLD ------------------------------------------

CREATE TABLE role (
    id INT PRIMARY KEY,
    name VARCHAR(100)
);

CREATE TABLE user (
    id INT PRIMARY KEY,
    id_role INT NOT NULL,
    name VARCHAR(100),
    surname VARCHAR(100),
    email VARCHAR(150),
    password VARCHAR(200),
    number VARCHAR(20),
    address VARCHAR(150),
    postal_code VARCHAR(10),
    date_inscription DATE,
    FOREIGN KEY (id_role) REFERENCES role(id)
);

CREATE TABLE category (
    id INT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE article (
    id INT PRIMARY KEY,
    id_category INT NOT NULL,
    name VARCHAR(100),
    description TEXT,
    price DECIMAL(10,2),
    illustration VARCHAR(255),
    is_new BOOLEAN,
    is_promo BOOLEAN,
    FOREIGN KEY (id_category) REFERENCES category(id)
);

CREATE TABLE basket (
    id INT PRIMARY KEY,
    id_user INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id)
);

CREATE TABLE basket_items (
    id INT PRIMARY KEY,
    id_basket INT NOT NULL,
    id_article INT NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (id_basket) REFERENCES basket(id),
    FOREIGN KEY (id_article) REFERENCES article(id)
);

CREATE TABLE payment (
    id INT PRIMARY KEY,
    id_user INT NOT NULL,
    amount DECIMAL(10,2),
    date_paiement DATE,
    mode VARCHAR(50),
    status VARCHAR(50),
    FOREIGN KEY (id_user) REFERENCES user(id)
);

CREATE TABLE notice (
    id INT PRIMARY KEY,
    id_user INT NOT NULL,
    id_article INT NOT NULL,
    rating INT,
    comment TEXT,
    date_avis DATE,
    FOREIGN KEY (id_user) REFERENCES user(id),
    FOREIGN KEY (id_article) REFERENCES article(id)
);

CREATE TABLE search_bar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    desgc VARCHAR(255) NOT NULL,
    descg VARCHAR(255) NOT NULL
);

INSERT INTO role VALUES
(1, 'admin'),
(2, 'client');

INSERT INTO user VALUES
(1, 2, 'Martin', 'Lucas', 'lucasmartin@mail.com', 'pass123', '0612547890', '12 rue Victor Hugo', '75015', '2024-01-10'),
(2, 2, 'Dupont', 'Claire', 'clairedupont@mail.com', 'pass123', '0678124590', '5 avenue de Lyon', '69002', '2024-02-11'),
(3, 2, 'Morel', 'Julien', 'julienmorel@mail.com', 'pass123', '0645781290', '47 boulevard Masséna', '75013', '2024-03-01'),
(4, 2, 'Lefevre', 'Emma', 'emma.lefevre@mail.com', 'pass123', '0623457812', '8 rue Lafayette', '59000', '2024-03-05'),
(5, 1, 'Admin', 'Site', 'admin@shop.com', 'admin123', '0600000000', 'Siège social', '00000', '2023-12-01');

INSERT INTO category VALUES
(1, 'Table'),
(2, 'Lampadaire'),
(3, 'Suspension'),
(4, 'Murale'),
(5, 'Bureau'),
(6, 'LED'),
(7, 'Enfants');

-- Catégorie 1: Table (1–10)
INSERT INTO article VALUES
(1,1,'Aurora','Éclairage moderne doux.',49.90,'aurora.jpg',1,0),
(2,1,'Nordik','Style bois scandinave.',59.90,'nordik.jpg',0,0),
(3,1,'ZenLight','Ambiance zen.',39.90,'zenlight.jpg',1,1),
(4,1,'CrystalDome','Dôme en verre.',89.90,'crystal.jpg',0,0),
(5,1,'VintageGlow','Style rétro.',55.90,'vintage.jpg',0,1),
(6,1,'IronShade','Métal brut.',69.00,'ironshade.jpg',0,0),
(7,1,'ScandiPure','Minimalisme pur.',52.00,'scandi.jpg',1,0),
(8,1,'SoftSphere','Sphère lumineuse.',44.00,'sphere.jpg',0,0),
(9,1,'RoyalGlass','Verre premium.',95.00,'royal.jpg',0,1),
(10,1,'StarLite','Effet étoilé.',39.00,'starlite.jpg',0,0);

-- Catégorie 2: Lampadaire (11–20)
INSERT INTO article VALUES
(11,2,'TreeBeam','3 spots sur pied.',120.00,'treebeam.jpg',0,0),
(12,2,'UrbanSteel','Métal urbain.',130.00,'urbansteel.jpg',1,0),
(13,2,'TriLux','Triple lumière LED.',110.00,'trilux.jpg',0,1),
(14,2,'ClassicStand','Style classique.',99.00,'classicstand.jpg',0,0),
(15,2,'ArcLine','Structure incurvée.',145.00,'arcline.jpg',1,0),
(16,2,'WarmShade','Tissu chaleureux.',95.00,'warmshade.jpg',0,0),
(17,2,'SlimModern','Design fin.',105.00,'slimmodern.jpg',1,0),
(18,2,'BladeLED','LED fine.',115.00,'bladeled.jpg',0,1),
(19,2,'WoodTower','Bois naturel.',125.00,'woodtower.jpg',0,0),
(20,2,'SmokeGlass','Verre fumé.',135.00,'smokeglass.jpg',1,0);

-- Catégorie 3: Suspension (21–30)
INSERT INTO article VALUES
(21,3,'ClearOrb','Globe transparent.',49.99,'clearorb.jpg',1,0),
(22,3,'TriSphere','3 globes.',109.99,'trisphere.jpg',0,1),
(23,3,'RattanDrop','Style bohème.',59.99,'rattandrop.jpg',1,0),
(24,3,'HaloRing','LED circulaire.',89.99,'haloring.jpg',0,0),
(25,3,'TubeLine','Moderne.',79.99,'tubeline.jpg',1,0),
(26,3,'SteelHang','Métal brut.',69.99,'steelhang.jpg',0,1),
(27,3,'HexaLight','Forme géométrique.',99.99,'hexalight.jpg',0,0),
(28,3,'ButterflyGlow','Décoratif.',39.99,'butterflyglow.jpg',1,0),
(29,3,'MinimalDrop','Minimaliste.',29.99,'minimaldrop.jpg',0,0),
(30,3,'WoodenAir','Bois naturel.',54.99,'woodenair.jpg',1,0);

-- Catégorie 4: Murale (31–40)
INSERT INTO article VALUES
(31,4,'WallBeam','LED fine.',34.99,'wallbeam.jpg',1,0),
(32,4,'GlassWave','Verre premium.',49.99,'glasswave.jpg',0,1),
(33,4,'RattanWall','Naturel.',29.99,'rattanwall.jpg',1,0),
(34,4,'SoftBall','Lumière douce.',24.99,'softball.jpg',0,0),
(35,4,'TubeWall','Design moderne.',39.99,'tubewall.jpg',1,0),
(36,4,'RingWall','Anneau LED.',59.99,'ringwall.jpg',0,1),
(37,4,'WoodWall','Bois scandinave.',44.99,'woodwall.jpg',0,0),
(38,4,'VintageWall','Métal vieilli.',34.99,'vintagewall.jpg',1,0),
(39,4,'GeoSquare','Géométrique.',19.99,'geosquare.jpg',0,0),
(40,4,'GoldenGlow','Effet luxueux.',79.99,'goldenglow.jpg',1,0);

-- Catégorie 5: Bureau (41–50)
INSERT INTO article VALUES
(41,5,'FlexiDesk','Bras flexible.',34.99,'flexidesk.jpg',1,0),
(42,5,'Architect','Réglable.',44.99,'architect.jpg',0,0),
(43,5,'LongArm','Éclairage large.',49.99,'longarm.jpg',1,0),
(44,5,'MetalDesk','Industriel.',39.99,'metaldesk.jpg',0,1),
(45,5,'Recharge','Batterie intégrée.',29.99,'recharge.jpg',1,0),
(46,5,'RattanDesk','Naturel.',34.99,'rattandesk.jpg',0,0),
(47,5,'ProLight','Éclairage professionnel.',59.99,'prolight.jpg',1,0),
(48,5,'SwanNeck','Flexible.',24.99,'swanneck.jpg',0,0),
(49,5,'SquareDesk','Design moderne.',19.99,'squaredesk.jpg',0,1),
(50,5,'DualBeam','Deux sources.',69.99,'dualbeam.jpg',1,0);

-- Catégorie 6: LED (51–60)
INSERT INTO article VALUES
(51,6,'TubeLED','Blanc froid.',14.99,'tubeled.jpg',0,0),
(52,6,'RGBGlow','Couleurs.',24.99,'rgbglow.jpg',1,1),
(53,6,'FlexStrip','Ruban LED.',19.99,'flexstrip.jpg',1,0),
(54,6,'SpotLight','Spot moderne.',29.99,'spotlight.jpg',0,0),
(55,6,'SquareLED','Encastrable.',34.99,'squareled.jpg',0,0),
(56,6,'PanelLED','Panneau fin.',49.99,'panelled.jpg',1,0),
(57,6,'HaloLED','Effet auréole.',39.99,'haloled.jpg',1,0),
(58,6,'MiniLED','Portable.',12.99,'miniled.jpg',0,0),
(59,6,'ChevetLED','Lumière douce.',22.99,'chevetled.jpg',1,1),
(60,6,'CylinderLED','Moderne.',27.99,'cylinderled.jpg',0,0);

-- Catégorie 7: Enfants (61–70)
INSERT INTO article VALUES
(61,7,'Cloudy','Douce pour bébé.',24.99,'cloudy.jpg',1,0),
(62,7,'Teddy','Chambre enfant.',19.99,'teddy.jpg',0,1),
(63,7,'Rocket','Thème espace.',29.99,'rocket.jpg',1,0),
(64,7,'Rainbow','Couleurs LED.',22.99,'rainbow.jpg',0,0),
(65,7,'Kitty','Adorable.',18.99,'kitty.jpg',1,0),
(66,7,'Moon','Veilleuse.',16.99,'moon.jpg',0,0),
(67,7,'Stars','Projette des étoiles.',34.99,'stars.jpg',1,0),
(68,7,'Dino','Dinosaure.',21.99,'dino.jpg',0,0),
(69,7,'Car','Rouge.',17.99,'car.jpg',0,1),
(70,7,'Unicorn','Rose pastel.',26.99,'unicorn.jpg',1,0);

INSERT INTO basket VALUES
(1, 2),
(2, 3),
(3, 5);

INSERT INTO basket_items VALUES
(1, 1, 1, 1),
(2, 1, 12, 2),
(3, 2, 22, 1),
(4, 3, 45, 3);

INSERT INTO payment VALUES
(1, 2, 179.97, '2024-03-20','CB Visa','Payé'),
(2, 3, 109.99, '2024-03-21','MasterCard','Payé'),
(3, 5, 89.97, '2024-03-22','PayPal','Payé');

INSERT INTO notice VALUES
(1, 2, 1, 5, 'Très bel éclairage, j’adore !', '2024-03-21'),
(2, 3, 12, 4, 'Bon lampadaire mais un peu cher.', '2024-03-22'),
(3, 5, 45, 5, 'Parfait pour mon bureau !', '2024-03-23');
