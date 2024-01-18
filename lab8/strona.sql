-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 16, 2024 at 09:04 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `strona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page_list`
--

CREATE TABLE `page_list` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_list`
--

INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES
(1, 'main', '<h1>Welcome!</h1>\r\n<h2>Make yourself at home.</h2>', 200),
(2, 'breakcore', '<h1>Breakcore & the Amen Break</h1>\r\n<p><b>Breakcore</b> is an electronic music dance genre which is a result of evolving jungle, <br>\r\nhardcore and drum\'n\'bass music back in the late 90s.</p>\r\n<p>Its characteristics are mainly very complex <b>breakbeats</b> and an unending palette of sampling <br>\r\nsources of any sound with potential to make the tune interesting.</p>\r\n<p>The genre itself doesn\'t limit itself to simply samples and grim themes as it can go from something <br>\r\nbeing rather humoristic or be absolutely driven with emotions of original pieces.</p>\r\n<img src=\"./img/amen.png\" alt=\"the amen break waveform\">\r\n<div class=\"paraf\">\r\n	<img src=\"./img/amen.jpg\" alt=\"Amen, Brother\" style=\"width: 240px; float: left; margin-right: 16px\">\r\n	<img src=\"./img/think.jpg\" alt=\"Think!\" style=\"width: 240px; float: right; margin-left: 16px\">\r\n	Most characteristic breakbeat for this genre is the <b>Amen Break</b> which is a snippet sampled from the track <u><i>Amen, Brother</i></u> by <i>The Winstons</i> released back in 1969.\r\n	At about 1 minute and 26 seconds into \"Amen, Brother\", the other musicians stop playing and the drummer, <b>Gregory Coleman</b>, performs a four-bar drum break that lasts for seven seconds. \r\n	For two bars, Coleman plays the previous beat. In the third bar, he delays a snare hit. In the fourth bar, he leaves the first beat empty,\r\n	then plays a syncopated pattern and an early crash cymbal. The drum break was added to lengthen the track, which had been too short with just the riff. \r\n	Spencer said he directed the break, but <b>Phil Tolotta</b>, the only other surviving member of the band in 2015, credited it solely to Coleman. Given the popularity of the sample, \r\n	The Winstons received no royalties for it whatsoever. The bandleader, <b>Richard Lewis Spencer</b>, was not aware of its use until 1996, after the statute of limitations \r\n	for copyright infringement had passed. He condemned its use as plagiarism, but later said it was flattering. He said it was unlikely that Coleman, \r\n	who died homeless and destitute in 2006, realized the impact he had made on music. <br>\r\n	<i><b>FUN FACT:</b> The whole track has been recorded in roughly 20 minutes only.</i> \r\n</div>', 200),
(3, 'inspiration', '<h1>Inspiration</h1>\r\n<p>As a breakcore music producer I\'ve been inspired by many different producers of the same genre as well <br>\r\nas electric avant-garde metal bands with roots of their music going right into spirituality and absolute madness.</p>\r\n<div class=\"paraf\">\r\n	<img src=\"./img/igorrr.jpg\" alt=\"Igorrr\" style=\"height: 310px; float: left; margin-right: 16px\">\r\n	Gautier Serre aka <b>Igorrr</b>, is a French musician. Under the Igorrr alias, he combines a variety of disparate genres, \r\n	including black metal, baroque music, breakcore, and trip hop, into a singular sound. Serre is also part of the groups <b>Whourkr</b> and <b>Corpo-Mente</b>. \r\n	The Igorrr project became a full band with the addition of vocalists Aphrodite Patoulidou and JB Le Bail, drummer Sylvain Bouvier, guitarist Martyn Clément and bassist Erlend Caspersen.\r\n	Igorrr claims to have synesthesia, as though perceiving music as colors. You can clearly hear the emphasize on vibrancy and dynamism in his works. Clearly something to look into.\r\n	I\'d recommend checking out these albums specifically: <i>Nostril (2010, Ad Noiseam)</i>, <span style=\"color: gold; font-style: italic\">Hallelujah (2012, Ad Noiseam)</span>, \r\n	<i>Savage Sinusoid (2017, Metal Blade Records)</i>, <i>Spirituality and Distortion (2020, Metal Blade Records)</i>.\r\n</div> \r\n<div class=\"paraf\">\r\n	<img src=\"./img/desper.jpg\" alt=\"Desper\" style=\"width: 250px; float: right; margin-left: 16px\">\r\n	<b>Desper / Desper of Ślepcy / dsp</b> - The father of polish breakcore scene, founder of Rygor Soundsystem based in Lublin. While still active, his dynamic pieces are as mesmerizing as ever.\r\n	He specializes in use of drum machines, completely neglecting the use of breakbeats while generating his own samples to cut up and glitch them indefinitely. Hearing him perform live has\r\n	always been an amazing experience. He\'s appeared on a few compilations released by netlabels such as <i>SKRD!!!</i>, <i>Suck Puck Records</i> and many more! He\'s recently released an album\r\n	of his collected works <span style=\"color: gold; font-style: italic\">Prace Zebrane (2022)</span>.\r\n</div>\r\n<div class=\"paraf\">\r\n	<img src=\"./img/sc3.jpeg\" alt=\"Secret Chiefs 3\" style=\"height: 240px; float: left; margin-right: 16px\">\r\n	<b>Secret Chiefs 3</b> is an American avant-garde group led by guitarist/composer <b>Trey Spruance</b> (of <i>Mr. Bungle</i>). \r\n	Their studio recordings and tours have featured different lineups, as the group performs a wide range of musical styles, mostly instrumental, \r\n	including surf rock, Persian, neo-Pythagorean, Indian, death metal, film music, and electronic music.\r\n	In 2007, it was announced that Secret Chiefs 3 has always been a general name for seven different bands, \r\n	each representing a different aspect of Spruance\'s musical and philosophical interests. \r\n	The seven bands are <i>Electromagnetic Azoth</i>, <i>UR</i>, <i>Ishraqiyun</i> (my personal favourite), \r\n	<i>Traditionalists</i>, <i>Holy Vehm</i>, <i>FORMS</i>, and <i>NT Fan</i>. You never really know what to expect with these guys!\r\n	While I\'d recommend checking out their entire discography, I\'d still consider these very good highlights: <br>\r\n	<span style=\"color: gold; font-style: italic\">Book M (2001, Web of Mimicry)</span>, <i>Hurqalya (Second Grand Constitution and Bylaws) (1998, Amarillo)</i>, <i>Malkhut (2018, Tzadik)</i>.\r\n</div> \r\n', 200),
(4, 'music', '<h1>Music</h1>\r\n<p>I\'ve been producing (I like to call that writing) music ever since 2015.<br>\r\nBefore that I had some piano classes that I hope I\'m making a good use out of them.<br>\r\nI focus on resonating my emotions through music hoping to help others through sound.<br>\r\nSometimes I really just want to be funny.</p>\r\n<p style=\"text-align:justify; padding-left:32px; padding-right:32px\">\r\n<img src=\"./img/sp.jpg\" alt=\"Suck Puck Records\" style=\"height: 140px; float: left; margin-right: 16px\">\r\n	I\'ve been working with <b>Suck Puck Records</b> for a few years now doing <a href=\"index.php?idp=audio\">mastering services</a> for them and releasing tracks on their compilations.\r\n	It\'s been founded by <b>Dima</b> aka <b>Fat Frumos</b>, Ukrainian rave music producer and DJ who aspires to make a collective of all other ravers from across the globe,\r\n	which I feel like he\'s already achieved a while ago. He\'s an experienced organizer of major underground events and is planning to go even further with merch quality and releases.\r\n</p>\r\n<p>Here are some of my major releases:</p>\r\n<table style=\"width: 100%; padding: 32px; border: 0px; border-collapse: separate;\">\r\n	<tr>\r\n		<td style=\"border: 0px\"><img src=\"./img/dlonie.jpg\" alt=\"Mekuso - Dłonie\" style=\"width:400px;\"></td>\r\n		<td style=\"border: 0px\"><img src=\"./img/otmn079.jpg\" alt=\"Mekuso - ReCalculations\" style=\"width:400px;\"></td>\r\n	</tr>\r\n	<tr>\r\n		<td>\r\n			<h3><a href=\"https://suckpuck.com/album/d-onie\">Mekuso - Dłonie (Album, 2020, Suck Puck Records)</a></h3>\r\n			<p>\"Dłonie\" - Hands. Touch, intimate, sacred feelings.<br>\r\n			An emotional trip through thoughts and frustrations over the years,<br>\r\n			including a handful of breakcore bangers.</p>\r\n		</td>\r\n		<td>\r\n			<h3><a href=\"https://www.otherman-records.com/releases/OTMN079\">Mekuso - ReCalculations (Album, 2017, Otherman Records)</a></h3>\r\n			<p>A throwback to older concept of playing around with time signatures.<br>\r\n			Contains remixes by music producers friends from Japan.</p>\r\n		</td>\r\n	</tr>\r\n	<tr>\r\n		<td style=\"border: 0px\"><img src=\"./img/sp2.jpg\" alt=\"VA - Spring Break vol. 2\" style=\"width:400px;\"></td>\r\n		<td style=\"border: 0px\"><img src=\"./img/mek.jpg\" alt=\"Mekuso - Raging Fun\" style=\"width:400px;\"></td>\r\n	</tr>\r\n	<tr>\r\n		<td>\r\n			<h3><a href=\"https://suckpuckcompillations.bandcamp.com/album/spring-break-va-vol-2\">Mekuso - Geno (Single, 2021, Suck Puck Records)</a></h3>\r\n			<p>Track released with 42 other ones as a special summer release.<br>\r\n			Mastering work done by yours truly.</p>\r\n		</td>\r\n		<td>\r\n			<h3><a href=\"https://www.discogs.com/release/7602229-Mekuso-Raging-Fun\">Mekuso - Raging Fun (EP, 2015, SKRD!!!)</a></h3>\r\n			<p>My first ever officially released music under a netlabel.<br>\r\n			Some of these tracks still have some potential to them.</p>\r\n		</td>\r\n	</tr>\r\n</table>', 200),
(5, 'audio', '<h1>Audio Services</h1>\r\n<p>I specialize in audio servicing, be it mixing or mastering services at my so-called studio.<br>\r\nI give my services to either label owners or individual producers who trust my ears.</p>\r\n<p>As for my portfolio:</p>\r\n<table style=\"width: 100%; padding: 32px; border: 0px; border-collapse: separate;\">\r\n	<tr>\r\n		<td style=\"border: 0px\"><img src=\"./img/laxen.jpg\" alt=\"Laxenanchaos - Growing Together in Love\" style=\"width:400px;\"></td>\r\n		<td style=\"border: 0px\"><img src=\"./img/sp3.jpg\" alt=\"Mekuso - ReCalculations\" style=\"width:400px;\"></td>\r\n	</tr>\r\n	<tr>\r\n		<td>\r\n			<h3><a href=\"https://anybodyuniverse.bandcamp.com/album/growing-together-in-love\">Laxenanchaos - Growing Together in Love<br>\r\n			(Album, 2020, ☯ anybody universe ☯)</a></h3>\r\n			<p>Emotional and manic pieces coming from the japanese genius himself.<br>\r\n			It\'s an honor to work with such artist.</p>\r\n		</td>\r\n		<td>\r\n			<h3><a href=\"https://suckpuckcompillations.bandcamp.com/album/fuk-the-borders-v-a-vol-9\">VA - Fuk The Borders vol. 9 (Compilation, 2023, Suck Puck Records)</a></h3>\r\n			<p>15 years of Suck Puck! We have gathered 34 tunes to celebrate it.</p>\r\n		</td>\r\n	</tr>\r\n</table>', 200),
(6, 'contacts', '<h1>Contact me!</h1>\r\n<p>Ask me about absolutely anything! I don\'t bite.</p>\r\n<form action=\"mailto:lemmgator@gmail.com\" method=\"get\" enctype=\"text/plain\">\r\n	<input type=\"text\" name=\"subject\" placeholder=\"name goes here!\"><br>\r\n	<input type=\"email\" name=\"email\" placeholder=\"email goes here!\"><br><br>\r\n	<textarea name=\"body\" rows=\"5\" cols=\"60\" placeholder=\"say something nice!\"></textarea><br>\r\n	<input type=\"submit\" value=\"send the thing...\">\r\n</form>\r\n', 200),
(7, 'filmy', '<div class=\"filmy\">\r\n	<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/JehJW4lyq7M\" frameborder=\"0\"></iframe>\r\n	<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/s3NVuO8ZUOQ\" frameborder=\"0\"></iframe>\r\n	<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/4uHVSexjYCY\" frameborder=\"0\"></iframe>\r\n</div>', 200),
(8, 'js', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n	<script src=\"./js/kolorujtlo.js\" type=\"text/javascript\"></script>\r\n	<script src=\"./js/timedate.js\" type=\"text/javascript\"></script>\r\n	<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js\"></script>\r\n	<link rel=\"stylesheet\" href=\"./css/style.css\"/>\r\n</head>\r\n\r\n<body onload=\"startclock()\">\r\n	\r\n	<FORM METHOD=\"POST\" NAME=\"background\">\r\n		<INPUT TYPE=\"button\" VALUE=\"lemmowy\" ONCLICK=\"changeBackground(\'#FE3B1F\')\">\r\n		<INPUT TYPE=\"button\" VALUE=\"czerwony\" ONCLICK=\"changeBackground(\'#FF0000\')\">\r\n		<INPUT TYPE=\"button\" VALUE=\"zielony\" ONCLICK=\"changeBackground(\'#00FF00\')\">\r\n		<INPUT TYPE=\"button\" VALUE=\"niebieski\" ONCLICK=\"changeBackground(\'#0000FF\')\">\r\n	</FORM>\r\n	<hr>\r\n	<div id=\"zegarek\"></div>\r\n	<div id=\"data\"></div>\r\n	\r\n	<div id=\"animacjaTestowa1\" class=\"test-block\">Kliknij, a się powiększe</div>\r\n	<script>\r\n		$(\"#animacjaTestowa1\").on(\"click\",function(){\r\n			$(this).animate({\r\n				width:\"500px\",\r\n				opacity:0.4,\r\n				fontSize:\"3em\",\r\n				borderWidth:\"10px\"\r\n			},1500);\r\n		});\r\n	</script>\r\n	\r\n	<div id=\"animacjaTestowa2\" class=\"test-block\">Najedź kursorem, a się powiększe</div>\r\n	<script>\r\n		$(\"#animacjaTestowa2\").on({\r\n			\"mouseover\":function(){\r\n				$(this).animate({\r\n					width:300\r\n				}, 800);\r\n			},\r\n			\"mouseout\":function(){\r\n				$(this).animate({\r\n					width:200\r\n				},800);\r\n			}\r\n		});\r\n	</script>\r\n	\r\n	<div id=\"animacjaTestowa3\" class=\"test-block\">Klikaj abym urósł</div>\r\n	<script>\r\n		$(\"#animacjaTestowa3\").on(\"click\",function(){\r\n			if(!$(this).is(\":animated\")){\r\n				$(this).animate({\r\n					width:\"+=\"+50,\r\n					height:\"+=\"+10,\r\n					opacity:\"-=\"+0.1,\r\n					duration:3000\r\n				});\r\n			}\r\n		});\r\n	</script>\r\n</body>\r\n</html>', 200);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `page_list`
--
ALTER TABLE `page_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `page_list`
--
ALTER TABLE `page_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
