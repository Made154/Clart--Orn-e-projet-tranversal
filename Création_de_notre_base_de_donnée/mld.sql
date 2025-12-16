-- -------------------------------------------- MLD ------------------------------------------
DROP DATABASE clare_ornee;
CREATE DATABASE clare_ornee;
USE clare_ornee;
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
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id)
);

CREATE TABLE basket_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
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

-- Catégorie 7: Enfants (61–70)
INSERT INTO article VALUES
(1, 1, 'Aurora', 'Lampe brillante', 49.90, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1yj9EvG9jPf78H7-90SBRszUl2a-ZXWFR2w&s', 0, 0),
(2, 1, 'Nordik', 'Bois scandinave', 59.90, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwT9Dm2BMMfJgRiRUrSyHFJReKZFWvzsMzpw&s', 0, 0),
(3, 1, 'ZenLight', 'Ambiance zen', 39.90, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSn-eDQ16ipZRkJWopYloYO-SzvIyhUtR76s837DrYJ5rYwXkEYejwSxGmz32yrfSvv8QHeWfP4er3YLlOls_3EbBfgBmnrcXZAIt_YEcdJ4wxpJo_a1xou&usqp=CAc', 0, 1),
(4, 1, 'Crystal', 'Verre élégant', 89.90, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxpBUHjm-0RwyLRVZztlFOgtpdheJBRHs7mA&s', 0, 0),
(5, 1, 'Vintage', 'Style rétro', 55.90, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcS9qIpPhygnOo3RzzJfB9mglY3R4m6D3t5265sznF97qH0b9mEPQr-vuUiKwWi8S8E70cKOdO6jTzMFPVFVBaTimldt63P7tme0Yjtl7v4gylizCrf31KrBkQ&usqp=CAc', 0, 0),

(6, 2, 'TreeBeam', 'Sur pied', 120.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzt4RUxkYWepmz7ZeOUfYiyvIA3OiGEpSI4Q&s', 0, 0),
(7, 2, 'UrbanSteel', 'Métal', 130.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR943c55rGbhFX903Yt2WqAqF3zt69on-CJOQ&s', 0, 0),
(8, 2, 'TriLux', 'LED', 110.00, 'https://lw-cdn.com/images/9CEC711EE9CE/k_cedffe6f8c447a4930dd99bf5ef6c2dc;w_1600;h_1600;q_100/9621246.jpg', 0, 1),
(9, 2, 'Classic', 'Classique', 99.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkcvdfjeNozUrJWyxx8rEr96cvDlYUAqbwXg1xDnJtsg&s', 0, 0),
(10, 2, 'ArcLine', 'Arc moderne', 145.00, 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRCbgfefr1vErZSS5rmTE5J0kuf4hhHuMgtvvWz8ipmySzEahEu_3k6g43vEeyLKvvcwJrNORn_51POeylN6V2LI3jQbXAGtvEpjCDkBF0&usqp=CAc', 1, 0),

(11, 3, 'ClearOrb', 'Globe', 49.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-b_rrnBGJwJCvwcZ7lminnwTehauFxAezFQ&s', 0, 0),
(12, 3, 'TriSphere', '3 globes', 109.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVaow9YeJmE7uIPjXkYwN7AbhySec1Y82uHw&s', 0, 1),
(13, 3, 'Rattan', 'Bohème', 59.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ48Gi8kVZiTPQaLFs4lB7wNZ9lVedJT6TVEg&s', 0, 0),
(14, 3, 'HaloRing', 'LED', 89.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRG1iBx6vBd6ZqTtIxr_Vmwhs_kDTv6JgOs_w&s', 0, 0),
(15, 3, 'TubeLine', 'Moderne', 79.99, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSky8Vq2kOTyw6izRX7wq1eDoXm4FApiLCKk6fapW21KGMIsgEtvhbBp013vSVmMqf5GNxZp3fy4LbTlH5hzWha31csv2k_Pc1BQfBFeVqIWuJvq9s_SaNy&usqp=CAc', 1, 0),

(16, 4, 'WallBeam', 'LED', 34.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIXaqfx7WABerXWkWHJtdjDqXIl-iNmuEOrA&s', 0, 0),
(17, 4, 'GlassWave', 'Verre', 49.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsiaLXCIuSlaea_A15Jo8xer-gQW7xt4wbrQ&s', 0, 1),
(18, 4, 'RattanWall', 'Naturel', 29.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScQ2m82ZqyEXNON8uS2c6PAKl8ckAamRYcWg&s', 0, 0),
(19, 4, 'SoftBall', 'Douce', 24.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXYogpyU1zlVVntt-idGS9px3IRceX9U5X1A&s', 0, 0),
(20, 4, 'RingWall', 'Anneau', 59.99, 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcSnwg34TKD51VJQTpSQ1szxxkWxQtHSsBAZfVg8Xr65IBU8FD6IIDVq6nnT1XxPWOuWVAycxZuEbAWzoyCdOtnTzMgtBWQa4YcQ41EooU7IVd-Ku2mREm9C&usqp=CAc', 0, 1),

(21, 5, 'FlexiDesk', 'Flexible', 34.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTr4itwEcOM5IOhjI_afrdyhbeDb5gJa6qD2Q&s', 0, 0),
(22, 5, 'Architect', 'Réglable', 44.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9My63M73GIyNKMh2fob2M-mcwNgIQEwdenA&s', 0, 0),
(23, 5, 'LongArm', 'Large', 49.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSwjSNTwEn59lMbR5XTMHttdCXjsjC6XVo1Eg&s', 1, 0),
(24, 5, 'MetalDesk', 'Industriel', 39.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSA8fZOvgh9RqEHojcK3zpo4_6I1BypZ5LDpw&s', 0, 1),
(25, 5, 'Recharge', 'Batterie', 29.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjqF3NVL6-2aRtLdmHyAa4ysm1pwGd3-pPfw&s', 0, 0),

(26, 6, 'NeoStrip', 'Ruban LED RGB', 29.99, 'https://www.silamp.fr/cdn/shop/products/E-a-1-zoom.jpg?v=1691765837&width=800', 1, 0),
(27, 6, 'LumaPanel', 'Panneau LED mural', 89.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6GCtMX7hoye9vqDcZ25DgVKHupeZnoSTi9gwT95yBVw&s', 0, 0),
(28, 6, 'SpotLine', 'Spot LED encastrable', 24.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS33GUeJ4NHG2tIZABZDMdrDzjN73wTik9lbA&s', 0, 0),
(29, 6, 'EdgeLight', 'Barre LED indirecte', 49.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjDgcjpwbZGstPKOR0JXNhRnwqJS3VY3ye_Q&s', 0, 1),
(30, 6, 'SmartGlow', 'LED connectée WiFi', 39.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkO3fuEYiARURZNwtuu-8fFENhLuVPluurgw&s', 1, 0),

(31, 7, 'GardenSpike', 'Piquet lumineux LED', 34.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9qNhxuh1Ufu_s4A9zfpWQIpNxM7WZd0bIbw&s', 0, 0),
(32, 7, 'WallOutdoor', 'Applique murale extérieure', 59.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6LXqSlPyaJF5pawmOsNeSVWCMgCQSnrOOxg&s', 1, 0),
(33, 7, 'SolarBeam', 'Lampe solaire jardin', 29.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfTCZONphtQjgeXfsxBKBLlD3021fLCn2nTw&s', 0, 1),
(34, 7, 'PathLight', 'Borne lumineuse extérieure', 79.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShdn8og-WQVG2UsTH0imiPZl4B8KIRhVP3Mg&s', 0, 0),
(35, 7, 'FloodMax', 'Projecteur LED extérieur', 99.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRdB7-Xlz-lu-dCN9pLuvOM2W8G0qsOU5bSg&s', 0, 1);

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
