-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 04:59 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_sbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `isi_artikel` text NOT NULL,
  `gambar_artikel` varchar(255) NOT NULL,
  `id_media` int(11) NOT NULL,
  `id_museum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `isi_artikel`, `gambar_artikel`, `id_media`, `id_museum`) VALUES
(1, 'Leslie Hore', 'https://artsandculture.google.com/exhibit/leslie-hore/0wLC7Y5BQBwHJg', 'img/artikel/Leslie Hore.png', 2, 1),
(2, 'SCRATCH PAPER', 'https://artsandculture.google.com/exhibit/scratch-paper/gQGmWIsw', 'img/artikel/SCRATCH PAPER.png', 1, 12),
(3, 'Pain...', 'https://artsandculture.google.com/exhibit/pain/-gJSzWV5pm0jKw', 'img/artikel/Pain....png', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `favorit`
--

CREATE TABLE `favorit` (
  `id_favorit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_lukisan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorit`
--

INSERT INTO `favorit` (`id_favorit`, `id_user`, `id_lukisan`) VALUES
(1, 3, 9),
(3, 3, 6),
(6, 2, 1),
(8, 4, 5),
(10, 3, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `info_artikel`
-- (See below for the actual view)
--
CREATE TABLE `info_artikel` (
`judul_artikel` varchar(255)
,`nama_media` varchar(30)
,`nama_museum` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `info_lukisan`
-- (See below for the actual view)
--
CREATE TABLE `info_lukisan` (
`judul` varchar(255)
,`tanggal_dibuat` varchar(25)
,`nama_seniman` varchar(100)
,`nama_media` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `info_museum`
-- (See below for the actual view)
--
CREATE TABLE `info_museum` (
`nama_museum` varchar(255)
,`kota` varchar(50)
,`negara` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `lukisan`
--

CREATE TABLE `lukisan` (
  `id_lukisan` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_seniman` int(11) NOT NULL,
  `tanggal_dibuat` varchar(25) NOT NULL,
  `tautan_eksternal` varchar(255) NOT NULL,
  `id_media` int(11) NOT NULL,
  `id_museum` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lukisan`
--

INSERT INTO `lukisan` (`id_lukisan`, `judul`, `id_seniman`, `tanggal_dibuat`, `tautan_eksternal`, `id_media`, `id_museum`, `gambar`, `deskripsi`) VALUES
(1, 'The Underwave off Kanagawa', 1, '1829', 'https://www.rijksmuseum.nl/nl/collectie/RP-P-1956-733', 1, 3, 'img/lukisan/The Underwave off Kanagawa.png', ''),
(2, 'Girl with Chrysanthemums', 2, '1894', '', 1, 4, 'img/lukisan/Girl with Chrysanthemums.png', 'In 1894 in Munich, Olga Boznanska\'s Girl with Chrysanthemums, one of her best pieces, was created - a true display of color limited to subtle shades of silver-grey hues, captured in the form of delicate brush strokes. In the image of the girl, shown against the background of the neutral, white and greyish wall, the artist created a new type of children\'s portrait that breaks with the convention of presenting small models in elegant outfits, in refined and stylish interiors.\r\n\r\nUnusually serious for her age, the lonely girl dressed in a modest dress is holding lightly-coloured chrysanthemums with her entwined hands, she attracts attention with her pale face with large eyes that are amazing in their blackness, shining like in a fever. The expression of these eyes looking directly, with tension, curiosity and boldness makes the girl, like a hypnotist, establish a psychological connection with the viewer.\r\n\r\nThe portrait exudes a pensive, sad, mysterious and vague aura, similar to the aura of the poems of Maurice Maeterlinck, known and appreciated by Boznanska. This similarity was noticed by William Ritter in 1896 in the Parisian \"Gazette des Beaux-Arts\". In his opinion, in this portrait \"a girl with strange disquieting eyes, as if two drops of ink spilling out onto the morbidly pale face, a contemporary ideal of Maeterlinck\'s character. It is an enigmatic child that will drive mad those who scrutinise her for too long. The girl is so frightening, so pale and so white that she sends shivers up the spine.\"'),
(3, 'The milkmaid', 3, '1660', 'https://www.rijksmuseum.nl/nl/collectie/SK-A-2344', 5, 3, 'img/lukisan/The milkmaid.jpg', 'Intent on her task, the kitchen maid pours milk from a jug. The composition radiates a quiet calm, the only movement being the flow of milk into the bowl. Its most exceptional feature is the rendering of light. The tiny dots representing the reflection of light - as in the br eadrolls on the table - are typical of Vermeer\'s technique. This painting is a high point within Vermeer\'s oeuvre. Of the thirty or so works he produced, four are in the Rijksmuseum. From the collections of J. Dissius (Delft), L. P. de Neufville, H. Muilman, L. van Winter and J. Six (Amsterdam), among others. Purchased with the support of the Vereniging Rembrandt from the heirs of J.H. Six van Vromade, 1908.'),
(4, 'Bamboo in Ink', 4, '1868', '', 2, 6, 'img/lukisan/Bamboo in Ink.png', ''),
(5, 'Marufa. A nurse working with Covid patients in Manchester Royal Infirmary ICU.', 5, '2020', '', 6, 7, 'img/lukisan/Marufa. A nurse working with Covid patients in Manchester Royal Infirmary ICU..jpg', 'Sarah says: \"It was an honour to be part of such a positive project. A huge thank you to all our NHS heroes especially Marufa for choosing me to paint her portrait and Tom Croft for the idea and dedicating so much of his time.\"\r\n\r\nMarufa says: \"So thankful for your time, talent and generosity.\"'),
(6, 'The Railway', 6, '1873', '', 7, 8, 'img/lukisan/The Railway.png', 'The Gare Saint-Lazare, in 1873 the largest and busiest train station in Paris, is unseen in this painting. Advances in industrial technology and train travel, intrinsic to most contemporary depictions of the site, remain in Manet\'s painting the almost invisible background for a genre depiction of a woman and child. Confined to a narrow space backed by the black bars of an iron fence and isolated by clouds of steam sent up from a train passing below, Manet\'s two models are enigmatic presences. The woman is Victorine Meurent, Manet\'s favorite model in the 1860s, and the child was the daughter of a fellow painter who allowed Manet to use his garden to create The Railway. The composition is a complex contrapuntal apposition of the two figures: one clad in a white dress trimmed with a blue bow and the other dressed in dark blue trimmed with white; one with hair bound by a narrow black ribbon and the other with flowing tresses under a black hat; and one a child standing and looking at anonymous trains and buildings in the background and the other a seated adult staring forward to confront viewers directly.\r\n\r\nManet submitted four works to the Paris Salon of 1874. Of the four, only two were accepted, The Railway and a watercolor. Reviewers were critical of the unfinished appearance of The Railway and that the rail station itself was not well-defined in the picture. Although Manet never chose to associate himself officially with the impressionist group, this painting\'s scene of modern life, as well as its loose, abstract effects, show the influence of the younger artists on his work.'),
(7, 'Armor for use on horseback in the field', 7, '1505', 'https://www.philamuseum.org/collections/permanent/308827.html', 4, 9, 'img/lukisan/Armor for use on horseback in the field.png', 'This armor is one of a few complete, or reasonably complete, European field armors surviving from the beginning of the sixteenth century. It is also the richest, latest, and most complete of the surviving works of Matthes Deutsch, a successful armorer living in the Bavarian ducal residence of Landshut. The bands along its main edges and down the center of the breastplate bear traces of etched and gilded flowers and foliage set against a fire-blued ground. The breastplate is struck with Deutsch\'s armorer\'s mark and with the inspection mark of the armorers of Landshut.'),
(8, 'On the Washburn', 8, '1815', 'https://collections.britishart.yale.edu/catalog/tms:5489', 3, 10, 'img/lukisan/On the Washburn.png', ''),
(9, 'Deed of the donation of the Statue of Liberty', 9, '1884', '', 1, 11, 'img/lukisan/Deed of the donation of the Statue of Liberty.png', 'Deed of the donation of the statue from the people of France to the people of the United States with signatures, July 4th, 1884.'),
(10, 'Piece', 10, '18th-19th century', 'https://www.metmuseum.org/art/collection/search/66104', 5, 5, 'img/lukisan/Piece.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `nama_media` varchar(30) NOT NULL,
  `deskripsi_media` text NOT NULL,
  `cover_media` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id_media`, `nama_media`, `deskripsi_media`, `cover_media`) VALUES
(1, 'Paper', 'Random or felted sheet of isolated vegetable fibre produced by sieving the macerated vegetable fibre from a watery slurry. Certain criteria must be met for a substance to be called paper: most importantly, the fibre must be vegetable; it must be processed in some way to break the material into individual fibres; and the sheets must be formed by casting the macerated fibre-water mixture on a sieve, usually a screen that is dipped into the aqueous mixture and allows the excess water to drain away. Paper is the most common support for drawing, printing, prints, watercolour painting and writing; with parchment, it was also widely used for the medieval manuscript, and for the development, from the 15th century onwards, of the printed book.', 'img/lukisan/Deed of the donation of the Statue of Liberty.png\r\n'),
(2, 'Ink', 'Imprecise term applied to a number of more or less fluid materials that are used for either writing or printing the written word or have evolved for a variety of illustrative and artistic purposes. Most inks for the written and printed word have always been black, or nearly so, but coloured inks also evolved for some writing, for embellishment and for pictorial work.', 'img/lukisan/Bamboo in Ink.png\r\n'),
(3, 'Watercolor painting', 'Pigment dissolved in water and bound by a colloid agent so that it adheres to the working surface when applied with the brush. The same name is used for a work of art in that medium. Watercolour may be transparent or opaque and is usually applied to paper, but sometimes also to such materials as silk or vellum. The term arises because, in varying degrees, water is always used in the largest proportion and, in the purest application of the medium, twice-both to mix pigments and to dilute the colours.', 'img/lukisan/On the Washburn.png'),
(4, 'Metal', 'Metals can be defined by their properties: they are malleable, so can be shaped by hammering and bending; tough and fairly elastic, so can sustain considerable stress without breaking; and dense and highly reflective, so capable of taking a good polish. They are also good conductors of heat and electricity. With the exception of iron, most common metals have relatively low melting-points (below 1100 C), so they can be easily melted, and on cooling they retain their molten shape. They can, therefore, be shaped by casting. They are also highly reactive, so although abundant in the Earth\'s crust, they are usually found in combination with other elements.', 'img/lukisan/Armor for use on horseback in the field.png'),
(5, 'Textile', 'A textile is a flexible material consisting of a network of natural or artificial fibers. Yarn is produced by spinning raw fibres of wool, flax, cotton, hemp, or other materials to produce long strands. Textiles are formed by weaving, knitting, crocheting, knotting, tatting, felting, or braiding.\r\nThe related words \"fabric\" and \"cloth\" and \"material\" are often used in textile assembly trades as synonyms for textile. However, there are subtle differences in these terms in specialized usage. A textile is any material made of interlacing fibres, including carpeting and geotextiles. A fabric is a material made through weaving, knitting, spreading, crocheting, or bonding that may be used in production of further goods. Cloth may be used synonymously with fabric but is often a piece of fabric that has been processed.\r\n', 'img/lukisan/Piece.jpg'),
(6, 'Oil paint', 'Method of painting using pigments dispersed in oil. It is not known how oil painting was first developed, but in Western Europe there are indications of its use from at least the 12th century AD, and it was widely used from the Renaissance. This article discusses the characteristics and development of oil painting in Western Europe.', 'img/lukisan/Marufa. A nurse working with Covid patients in Manchester Royal Infirmary ICU..jpg'),
(7, 'Canvas', 'Type of strong, substantial cloth originally made of hemp (Cannabis sativa, from which it takes its name) but more likely to be of a coarse flax or tightly woven linen; similar textiles of cotton or jute are also called canvas. A cloth type rather than a specific cloth, with varied practical applications, canvas is important as a material used for making painting supports. \'Canvas\' has therefore come to mean not only the raw cloth but also a piece of fabric mounted on a stretching frame and prepared for use in painting or a finished painting, usually in oils, painted on a textile support.\r\n', 'img/lukisan/The Railway.png'),
(8, 'Graphite', 'Crystalline allotropic form of carbon, used primarily as a drawing material, in the form of a pencil. It is a friable substance, composed of flat, flaky grains, which are transferred to the surface of the support (usually paper) as the artist draws and impart a delicate sheen to the strokes. Synthetic graphite, which has been produced commercially since 1897, is obtained from carborundum. Graphite was first excavated in Bavaria in the early 13th century, but its potential as an artists\' medium remained unexploited until the discovery in the mid-16th century of pure graphite at Borrowdale in Cumbria, England. The Borrowdale mine was in full operation by the 1580s, when native graphite was taken from the mine, sawn into sheets and then into slender square rods forming the \'lead\' and then encased in wood to form the pencil. Graphite seems to have been used first for underdrawing in the 16th century, supplanting the leadpoint stylus from which the term \'lead\' pencil probably derived.\r\n', 'img/lukisan/View of Benevento.png');

-- --------------------------------------------------------

--
-- Table structure for table `museum`
--

CREATE TABLE `museum` (
  `id_museum` int(11) NOT NULL,
  `nama_museum` varchar(255) NOT NULL,
  `deskripsi_museum` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `museum`
--

INSERT INTO `museum` (`id_museum`, `nama_museum`, `deskripsi_museum`, `logo`, `negara`, `kota`, `alamat`) VALUES
(1, 'State Library of New South Wales', 'The State Library of New South Wales is the premier library for the people of New South Wales, Australia. The Library\'s extraordinary collections document the heritage of Australia and Oceania and are one of the State\'s most valuable assets. By building, preserving and delivering its collections, including today\'s born digital materials, the Library enables Australians to interrogate our past and imagine our future.', 'img/logo/State Library of New South Wales.png', 'Australia', 'Sydney', 'Macquarie St<br>\r\nSydney NSW 2000<br>\r\nAustralia\r\n'),
(2, 'Tate Britain', 'Tate Britain (known from 1897 to 1932 as the National Gallery of British Art and from 1932 to 2000 as the Tate Gallery) is an art museum on Millbank in the City of Westminster in London. It is part of the Tate network of galleries in England, with Tate Modern, Tate Liverpool and Tate St Ives. It is the oldest gallery in the network, having opened in 1897. It houses a substantial collection of the art of the United Kingdom since Tudor times, and in particular has large holdings of the works of J. M. W. Turner, who bequeathed all his own collection to the nation. It is one of the largest museums in the country.', 'img/logo/Tate Britain.png', 'United Kingdom', 'London', 'Millbank<br>\r\nWestminster, London<br>\r\nSW1P 4RG<br>\r\nUK'),
(3, 'Rijksmuseum', 'The Rijksmuseum is the museum of the Netherlands. Its world-famous masterworks from the Dutch Golden Age include the Milkmaid by Vermeer and Rembrandt\'s Night Watch. The Rijksmuseum itself is also a masterpiece. The collection is presented in a stunning building with amazing interior design. In 80 galleries 8,000 objects tell the story of 800 years of Dutch art and history, from the Middle Ages to Mondrian. Every year, over 2.5 million visitors travel through the ages and experience a feeling of beauty and sense of time.', 'img/logo/Rijksmuseum.png', 'Netherlands', 'Amsterdam', 'Museumstraat 1<br>\r\n1071 XX Amsterdam<br>\r\nNetherlands'),
(4, 'The National Museum in Krakow', 'The National Museum in Krakow was established by a resolution of the Krakow City Council on 7 October 1879, as the first national museum institution at a time when the Polish people were deprived of their own statehood and country, which had been appropriated by the partitioning powers.\r\n\r\nUntil the end of World War I it was the only such large museum accessible to the public in the Polish lands, and to this day remains the institution with the largest numbers of collections, buildings and permanent exhibitions.\r\n\r\n', 'img/logo/The National Museum in Krakow.png', 'Poland', 'Krakow', 'al. 3 Maja 1<br>\r\n30-062 Krakow<br>\r\nPoland'),
(5, 'The Metropolitan Museum of Art', 'The Met presents over 5,000 years of art from around the world for everyone to experience and enjoy. The Museum lives in three iconic sites in New York City-The Met Fifth Avenue, The Met Breuer, and The Met Cloisters. Millions of people also take part in The Met experience online.\r\n\r\nSince it was founded in 1870, The Met has always aspired to be more than a treasury of rare and beautiful objects. Every day, art comes alive in the Museum\'s galleries and through its exhibitions and events, revealing both new ideas and unexpected connections across time and across cultures.', 'img/logo/The Metropolitan Museum of Art.png', 'United States', 'New York', '1000 5th Ave<br>\r\nNew York, NY 10028<br>\r\nUSA'),
(6, 'Korea Data Agency', 'The Korea Database Agency is committed to helping upgrade the database industry and contributing to an advanced knowledge-based country. Since its establishment in 1993 when information technology was beginning to burgeon, the Korea Database Agency (KoDB) has playing a pivotal role in promoting Korea\'s database industry.', 'img/logo/Korea Data Agency.png', 'South Korea', 'Seoul', '51 Jong-ro, Jongno 1(il).2(i).3(sam).4(sa)<br>\r\nJongno-gu, Seoul<br>\r\nSouth Korea'),
(7, 'Paintings in Hospitals', 'Paintings in Hospitals is a national charity dedicated to using world-class art to inspire better health for people in the UK. Founded in 1959, the Paintings in Hospitals art collection is the first and only national collection curated with the specific purpose of improving people\'s mental and physical wellbeing.\r\n\r\nThe collection holds 4,000 artworks, including pieces by Bridget Riley, Antony Gormley, Andy Warhol, Josef Albers, Anish Kapoor, Maggi Hambling, Ian Davenport, Wilhelmina Barns-Graham, Elizabeth Blackadder, Helen Chadwick, Alexander Calder, Sonia Boyce and many more.\r\n\r\nArtworks from the Paintings in Hospitals collection are on public display in over 180 health and social care organisations in England, Wales and Northern Ireland.\r\n\r\nThis page features artworks from the Healthcare Heroes exhibition, an incredible series of portraits painted to celebrate the staff, caregivers and role art played during the COVID-19 crisis.', 'img/logo/Paintings in Hospitals.jpg', 'United Kingdom', 'London', 'First Floor, Menier Chocolate Factory<br>\r\n51 Southwark St<br>\r\nLondon<br>\r\nSE1 1RU<br>\r\nUK'),
(8, 'National Gallery of Art, Washington DC', 'The National Gallery of Art - the nation\'s museum - preserves, collects, exhibits, and fosters an understanding of works of art.\r\n\r\nVisit us on the National Mall between Third and Seventh Streets at Constitution Avenue, NW, we are open Monday through Saturday from 10:00 a.m. to 5:00 p.m. and Sunday from 11:00 a.m. to 6:00 p.m., and closed on December 25 and January 1. Admission is always free.\r\n\r\n', 'img/logo/National Gallery of Art, Washington DC.png', 'United States', 'Washington', 'National Gallery of Art<br>\r\nConstitution Ave. NW<br>\r\nWashington, DC 20565<br>\r\nUSA\r\n'),
(9, 'Philadelphia Museum of Art', 'The Philadelphia Museum of Art is Philadelphia\'s art museum. We are a landmark building. A world-renowned collection. A place that welcomes everyone. We bring the arts to life, inspiring visitors-through scholarly study and creative play-to discover the spirit of imagination that lies in everyone. We connect people with the arts in rich and varied ways, making the experience of the Museum surprising, lively, and always memorable. We are committed to inviting visitors to see the world-and themselves-anew through the beauty and expressive power of the arts.', 'img/logo/Philadelphia Museum of Art.png', 'United States', 'Philadelphia', '2600 Benjamin Franklin Pkwy<br>\r\nPhiladelphia, PA 19130<br>\r\nUSA'),
(10, 'Yale Center for British Art', 'The Yale Center for British Art houses the largest and most comprehensive collection of British art outside the United Kingdom. Presented to the University by Paul Mellon (Yale College Class of 1929), the collection of paintings, sculpture, drawings, prints, rare books, and manuscripts reflects the development of British art and culture from the Elizabethan period to present day. Within the collection, which is free and open to the public, are masterpieces by artists such as J.M.W. Turner, Joshua Reynolds, and Barbara Hepworth.\r\nThe Center offers a year-round schedule of exhibitions and programs, including films, concerts, lectures, tours, symposia, and family events. It also provides numerous opportunities for scholarly research, such as residential fellowships. Academic resources of the Center include the reference library and photo archive, conservation laboratories, and a study room for examining prints, drawings, watercolors, rare books, manuscripts, maps, and other special collections.', 'img/logo/Yale Center for British Art.png', 'United States', 'New Haven', '1080 Chapel St<br>\r\nNew Haven, CT 06510<br>\r\nUSA\r\n'),
(11, 'Metiers Art Museum', 'Founded in 1794 by Henri Gregoire, the Conservatoire national des arts et metiers, \"a store of new and useful inventions,\" is a museum of technological innovation. The Musee des arts et metiers was refurbished in 2000, and now exhibits over 2,400 inventions.', 'img/logo/Metiers Art Museum.png', 'France', 'Paris', '60 Rue Réaumur<br>\r\n75003 Paris<br>\r\nFrance'),
(12, '9eme Concept', 'The 9th Concept is a collective of artists based in Montreuil.\r\n\r\nThe association has developed a creative process that combines graphics, painting, collage, music, street art, happenings ...\r\n\r\nFounded in 1990 by Stephane Carricondo, Ned and Jerk 45, the group has expanded as and when the years. The 9th Concept account in 2013 15 painters, designers, tattoo artists, illustrators, artists.', 'img/logo/9eme Concept.png', 'France', 'Paris', '7 Rue de Capri<br>\r\n75012 Paris<br>\r\nFrance'),
(13, 'Museum of Fine Arts in Peredelkino', 'The museum is located in the legendary writer\'s village Peredelkino 5 km. from Moscow. This is a Museum for children and adults. Museum of the great paintings by contemporary Russian artists - Katya Medvedeva, Lucy VORONOVA, Victor Nikolayev, Arsen Levonee, Sergei Ladoshin, Vadim Romanov. The Museum has a laboratory of artistic and social project, where every visitor will be able to create their own exposition, and develop a proactive social project.', 'img/logo/Museum of Fine Arts in Peredelkino.png', 'Russia', 'Moscow', 'Moscow, Karla Marxa, 1<br>\r\nMoscow, DSK Michurinetch<br>\r\nRussia<br>\r\n142783');

-- --------------------------------------------------------

--
-- Table structure for table `seniman`
--

CREATE TABLE `seniman` (
  `id_seniman` int(11) NOT NULL,
  `nama_seniman` varchar(100) NOT NULL,
  `deskripsi_seniman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seniman`
--

INSERT INTO `seniman` (`id_seniman`, `nama_seniman`, `deskripsi_seniman`) VALUES
(1, '-', 'seniman tidak diketahui'),
(2, 'Olga Boznanska', 'Olga Boznanska was a Polish painter of the turn of the 20th century. She was a notable female painter in Poland and Europe, and was stylistically associated with the French impressionism.\r\n'),
(3, 'Johannes Vermeer', 'Johannes Vermeer, in original Dutch Jan Vermeer van Delft, was a Dutch Baroque Period painter who specialized in domestic interior scenes of middle class life. During his lifetime, he was a moderately successful provincial genre painter, recognized in Delft and The Hague. Nonetheless, he produced relatively few paintings and evidently was not wealthy, leaving his wife and children in debt at his death.\r\nVermeer worked slowly and with great care, and frequently used very expensive pigments. He is particularly renowned for his masterly treatment and use of light in his work.\r\n\"Almost all his paintings,\" Hans Koningsberger wrote, \"are apparently set in two smallish rooms in his house in Delft; they show the same furniture and decorations in various arrangements and they often portray the same people, mostly women.\"\r\nHis modest celebrity gave way to obscurity after his death. He was barely mentioned in Arnold Houbraken\'s major source book on 17th-century Dutch painting and was thus omitted from subsequent surveys of Dutch art for nearly two centuries.'),
(4, 'Kim Gyu-jin', ''),
(5, 'Sarah Harding', ''),
(6, 'Edouard Manet', 'Edouard Manet was a French modernist painter. He was one of the first 19th-century artists to paint modern life, and a pivotal figure in the transition from Realism to Impressionism.\r\nBorn into an upper-class household with strong political connections, Manet rejected the future originally envisioned for him, and became engrossed in the world of painting. His early masterworks, The Luncheon on the Grass and Olympia, both 1863, caused great controversy and served as rallying points for the young painters who would create Impressionism. Today, these are considered watershed paintings that mark the start of modern art. The last 20 years of Manet\'s life saw him form bonds with other great artists of the time, and develop his own style that would be heralded as innovative and serve as a major influence for future painters.'),
(7, 'Matthes Deutsch', ''),
(8, 'J. M. W. Turner', 'Joseph Mallord William Turner RA, known contemporarily as William Turner, was an English Romantic painter, printmaker and watercolourist. He is known for his expressive colourisations, imaginative landscapes and turbulent, often violent marine paintings.\r\nTurner was born in Maiden Lane, Covent Garden, London, to a modest lower-middle-class family. He lived in London all his life, retaining his Cockney accent and assiduously avoiding the trappings of success and fame. A child prodigy, Turner studied at the Royal Academy of Arts from 1789, enrolling when he was 14, and exhibited his first work there at 15. During this period, he also served as an architectural draftsman. He earned a steady income from commissions and sales, which due to his troubled, contrary nature, were often begrudgingly accepted. He opened his own gallery in 1804 and became professor of perspective at the academy in 1807, where he lectured until 1828, although he was viewed as profoundly inarticulate. He traveled to Europe from 1802, typically returning with voluminous sketchbooks.\r\nIntensely private, eccentric and reclusive, Turner was a controversial figure throughout his career.'),
(9, 'Union franco-americaine de Paris', ''),
(10, 'Hokusai', 'Katsushika Hokusai was a Japanese artist, ukiyo-e painter and printmaker of the Edo period. Born in Edo, Hokusai is best known as author of the woodblock print series Thirty-six Views of Mount Fuji which includes the internationally iconic print, The Great Wave off Kanagawa.\r\nHokusai created the Thirty-Six Views both as a response to a domestic travel boom and as part of a personal obsession with Mount Fuji. It was this series, specifically The Great Wave print and Fine Wind, Clear Morning, that secured Hokusai\'s fame both in Japan and overseas. As historian Richard Lane concludes, \"if there is one work that made Hokusai\'s name, both in Japan and abroad, it must be this monumental print-series\". While Hokusai\'s work prior to this series is certainly important, it was not until this series that he gained broad recognition.'),
(11, 'Mary Cassatt', 'Mary Stevenson Cassatt was an American painter and printmaker. She was born in Allegheny City, Pennsylvania, but lived much of her adult life in France, where she first befriended Edgar Degas and later exhibited among the Impressionists. Cassatt often created images of the social and private lives of women, with particular emphasis on the intimate bonds between mothers and children.\r\nShe was described by Gustave Geffroy in 1894 as one of \"les trois grandes dames\" of Impressionism alongside Marie Bracquemond and Berthe Morisot. In 1879, Diego Martelli, compared her to Degas, as they both sought to depict movement, light, and design in the most modern sense.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 2),
(2, 'test', '098f6bcd4621d373cade4e832627b4f6', 'Test', 1),
(3, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'User 1', 1),
(4, 'user2', '7e58d63b60197ceb55a1c487989a3720', 'User 2', 1);

-- --------------------------------------------------------

--
-- Structure for view `info_artikel`
--
DROP TABLE IF EXISTS `info_artikel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_artikel`  AS  select `artikel`.`judul_artikel` AS `judul_artikel`,`media`.`nama_media` AS `nama_media`,`museum`.`nama_museum` AS `nama_museum` from ((`artikel` join `media`) join `museum`) where `artikel`.`id_media` = `media`.`id_media` and `artikel`.`id_museum` = `museum`.`id_museum` ;

-- --------------------------------------------------------

--
-- Structure for view `info_lukisan`
--
DROP TABLE IF EXISTS `info_lukisan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_lukisan`  AS  select `lukisan`.`judul` AS `judul`,`lukisan`.`tanggal_dibuat` AS `tanggal_dibuat`,`seniman`.`nama_seniman` AS `nama_seniman`,`media`.`nama_media` AS `nama_media` from ((`lukisan` join `seniman`) join `media`) where `lukisan`.`id_seniman` = `seniman`.`id_seniman` and `lukisan`.`id_media` = `media`.`id_media` ;

-- --------------------------------------------------------

--
-- Structure for view `info_museum`
--
DROP TABLE IF EXISTS `info_museum`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_museum`  AS  select `museum`.`nama_museum` AS `nama_museum`,`museum`.`kota` AS `kota`,`museum`.`negara` AS `negara` from `museum` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_media` (`id_media`),
  ADD KEY `id_museum` (`id_museum`);

--
-- Indexes for table `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id_favorit`),
  ADD KEY `id_lukisan` (`id_lukisan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `lukisan`
--
ALTER TABLE `lukisan`
  ADD PRIMARY KEY (`id_lukisan`),
  ADD KEY `id_media` (`id_media`),
  ADD KEY `id_museum` (`id_museum`),
  ADD KEY `id_seniman` (`id_seniman`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`);

--
-- Indexes for table `museum`
--
ALTER TABLE `museum`
  ADD PRIMARY KEY (`id_museum`);

--
-- Indexes for table `seniman`
--
ALTER TABLE `seniman`
  ADD PRIMARY KEY (`id_seniman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id_favorit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lukisan`
--
ALTER TABLE `lukisan`
  MODIFY `id_lukisan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `museum`
--
ALTER TABLE `museum`
  MODIFY `id_museum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `seniman`
--
ALTER TABLE `seniman`
  MODIFY `id_seniman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_3` FOREIGN KEY (`id_media`) REFERENCES `media` (`id_media`),
  ADD CONSTRAINT `artikel_ibfk_4` FOREIGN KEY (`id_museum`) REFERENCES `museum` (`id_museum`);

--
-- Constraints for table `favorit`
--
ALTER TABLE `favorit`
  ADD CONSTRAINT `favorit_ibfk_2` FOREIGN KEY (`id_lukisan`) REFERENCES `lukisan` (`id_lukisan`),
  ADD CONSTRAINT `favorit_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `lukisan`
--
ALTER TABLE `lukisan`
  ADD CONSTRAINT `lukisan_ibfk_4` FOREIGN KEY (`id_media`) REFERENCES `media` (`id_media`),
  ADD CONSTRAINT `lukisan_ibfk_5` FOREIGN KEY (`id_museum`) REFERENCES `museum` (`id_museum`),
  ADD CONSTRAINT `lukisan_ibfk_6` FOREIGN KEY (`id_seniman`) REFERENCES `seniman` (`id_seniman`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
