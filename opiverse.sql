-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 09:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opiverse`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(255) NOT NULL,
  `club_id` int(255) NOT NULL,
  `topic_id` int(255) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `overview` varchar(1000) NOT NULL,
  `MainContent` varchar(1000) NOT NULL,
  `Extra` varchar(1000) NOT NULL,
  `conclusion` varchar(1000) NOT NULL,
  `BannerImage` varchar(1000) NOT NULL,
  `ContentImage` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `articleby` varchar(255) NOT NULL,
  `createdAt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `club_id`, `topic_id`, `title`, `overview`, `MainContent`, `Extra`, `conclusion`, `BannerImage`, `ContentImage`, `timestamp`, `articleby`, `createdAt`) VALUES
(1, 1, 2, 'Introduction (The Age of A.I.)', 'The Age of A.I. is an eight-episode American science documentary streaming television series narrated and hosted by American actor Robert Downey Jr. The show covers the applications of artificial intelligence (AI) in various fields, like health, robotics, space-travel, food, disaster-prevention, and others. Each 30-45 minute episode covers several different areas of AI implementation under one broader topic.', 'Soul Machines is a company that works on creating lifelike simulations of humans using AI. Soul Machines and their CEO, Mark Sagar, created BabyX, a fully simulated baby, which is based on Sagar\'s real-life daughter. Soul Machines gets in contact with the popular musician will.i.am and offers to create an artificial version of him.', 'Tim Shaw was a prominent football player who was diagnosed with Amyotrophic lateral sclerosis (ALS). At this point, Shaw’s ALS has progressed to the point where he relies on his parents for physical support and speaks with a speech impediment.', 'Jim Ewing is a rock climber who had chronic pain in his leg after a rock-climbing accident. He reconnected with an old roommate of his, Hugh Herr, who lost both of his legs in a rock-climbing accident. Herr created his own prosthetic legs using AI that makes decisions through neurological signals. Ewing decided to have his leg with chronic pain willingly amputated to try Herr’s new technology.', '', '', '2023-05-18 16:19:58', '2147483647', '18-May-2023'),
(2, 1, 2, 'Human VS Robots', 'Fictional robots are often capable of moving around the world and having other characteristics of humans. In their depiction, there is frequently some essence that transcends their physical trapping and they may be capable of thinking, feeling, judging, and exploring. It is easy to imagine R2D2 and C3PO, robots from George Lucas\'s popular movie Star Wars (1977), as companions—even friends. These machines of fiction give robotic researchers goals to build toward. Unfortunately, humans in 2002 do not yet have the capability of creating any of these imagined robots.', 'Nevertheless, we have created machines for space exploration that we do call robots. Examples include the Sojourner robot from the 1997 Mars Pathfinder mission and the robotic arms from the space shuttle and the International Space Station. It is possible to coax these machines to do marvelous tasks in space and on planetary surfaces, although in most ways these devices are much closer to a car than they are to the robots of science fiction.', 'Space missions are expensive and require a great deal of planning and long, careful preparation. Hence, the technologies flown on missions are often several years behind the state of the art for terrestrial applications. One of the consequences of this is that we can simply look at the technology that is available for use in Earth applications (e.g., autonomy used in vehicles in agriculture) and realize that the technologies behind these applications will be available in a decade or so in space missions.', 'Given that modern space robots have a closer relationship to appliances than they do to the robotics stars of Hollywood, it is not easy to clearly define what is a robot and what is not. Generally for space applications, robots are machines that have some level of autonomy,', '', '', '2023-05-18 16:22:28', '2147483647', '18-May-2023'),
(3, 1, 4, 'What Is a Blockchain?', 'A blockchain is a distributed database or ledger shared among a computer network\'s nodes. They are best known for their crucial role in cryptocurrency systems for maintaining a secure and decentralized record of transactions, but they are not limited to cryptocurrency uses. Blockchains can be used to make data in any industry immutable—the term used to describe the inability to be altered.', 'Because there is no way to change a block, the only trust needed is at the point where a user or program enters data. This aspect reduces the need for trusted third parties, which are usually auditors or other humans that add costs and make mistakes.', 'Since Bitcoin\'s introduction in 2009, blockchain uses have exploded via the creation of various cryptocurrencies, decentralized finance (DeFi) applications, non-fungible tokens (NFTs), and smart contracts', 'This content is inspired by https://www.investopedia.com/terms/b/blockchain.asp and this is used for personal project work only..', '', '', '2023-05-18 16:27:51', '2147483647', '18-May-2023'),
(4, 1, 4, 'Pros and Cons of Blockchain', 'For all of its complexity, blockchain’s potential as a decentralized form of record-keeping is almost without limit. ', 'From greater user privacy and heightened security to lower processing fees and fewer errors, blockchain technology may very well see applications beyond those outlined above. But there are also some disadvantages.', 'Transactions on the blockchain network are approved by thousands of computers and devices. This removes almost all people from the verification process, resulting in less human error and an accurate record of information. Even if a computer on the network were to make a computational mistake, the error would only be made to one copy of the blockchain and not be accepted by the rest of the network.', 'This content is inspired by https://www.investopedia.com/terms/b/blockchain.asp and this is used for personal project work only..', '', '', '2023-05-18 18:20:08', '2147483647', '18-May-2023'),
(5, 1, 5, 'The Different Types of Cybersecurity', 'Most attacks occur over the network, and network security solutions are designed to identify and block these attacks. These solutions include data and access controls such as Data Loss Prevention (DLP), IAM (Identity Access Management), NAC (Network Access Control), and NGFW (Next-Generation Firewall) application controls to enforce safe web use policies.', 'Advanced and multi-layered network threat prevention technologies include IPS (Intrusion Prevention System), NGAV (Next-Gen Antivirus), Sandboxing, and CDR (Content Disarm and Reconstruction). Also important are network analytics, threat hunting, and automated SOAR (Security Orchestration and Response) technologies.', 'While many cloud providers offer security solutions, these are often inadequate to the task of achieving enterprise-grade security in the cloud. Supplementary third-party solutions are necessary to protect against data breaches and targeted attacks in cloud environments.', 'This content is inspired by https://www.checkpoint.com/cyber-hub/cyber-security/what-is-cybersecurity/ and this is used for personal project work only..', '', '', '2023-05-18 18:21:52', '2147483647', '18-May-2023'),
(6, 1, 5, 'Supply Chain Attacks', 'Historically, many organizations’ security efforts have been focused on their own applications and systems. By hardening the perimeter and only permitting access to authorized users and applications, they try to prevent cyber threat actors from breaching their networks.\r\n\r\n', 'Recently, a surge in supply chain attacks has demonstrated the limitations of this approach and cybercriminals’ willingness and ability to exploit them. Incidents like the SolarWinds, Microsoft Exchange Server, and Kaseya hacks demonstrated that trust relationships with other organizations can be a weakness in a corporate cyber security strategy. By exploiting one organization and leveraging these trust relationships, a cyber threat actor can gain access to the networks of all of their customers.', 'Protecting against supply chain attacks requires a zero trust approach to security. While partnerships and vendor relationships are good for business, third-party users and software should have access limited to the minimum necessary to do their jobs and should be continually monitored.', 'This content is inspired by https://www.checkpoint.com/cyber-hub/cyber-security/what-is-cybersecurity/ and this is used for personal project work only..', '', '', '2023-05-18 18:23:12', '2147483647', '18-May-2023'),
(7, 2, 3, 'Bernardo Silva\'s goal underlines the inevitability of Manchester City: moment of the mid-week', 'Two very one-sided semifinal second legs later, we have our finalists of the UEFA Champions League. Where Internazionale saw off neighbours AC Milan with a comfortable 1-0 win, Manchester City gave Real Madrid a footballing lesson as they beat them 4-0 on Wednesday night. Our moment of the Champions League midweek action comes from that educational program -- the first goal scored by the man of the match on the night, Bernardo Silva.', 'The move starts, technically, when Eder Militao gets a rather desperate standing tackle in on Jack Grealish as he marauds down the middle. The clock reads 22:15 when Grealish recovers it himself and moves on to his more natural left-wing position.', 'For the first 20 minutes, Manchester City have been torturing Real Madrid at the Etihad. In that opening period City have had 13 touches in the penalty area and 107 in the attacking third. The number for Madrid on both those stats? Zero.', 'This content is inspired by https://www.espn.in/espn/story/_/id/37674432/bernardo-silva-goal-inevitability-manchester-city-moment-midweek and this is used for personal project work only..', '', '', '2023-05-18 18:25:45', '2147483647', '18-May-2023'),
(8, 2, 3, ' UConn\'s win streaks, then and now', 'If memory serves, the news came while an average Baylor team was beating a not-very-good Texas A&M team in a first-round yawner at the Big 12 tournament in Dallas.', 'It was March 11, 2003, and something had happened for the first time since March 30, 2001: UConn\'s women had lost a game. The buzz went around the press corps at Reunion Arena as everybody tried to be the first to tell everybody else.', 'I think broadcaster Debbie Antonelli was there preparing for the next day\'s quarterfinal broadcasts  or maybe I only think that because it seems as if she is at virtually every game that\'s played.', 'This content is inspired by https://www.espn.in/womens-college-basketball/columns/story?columnist=voepel_mechelle&id=4949119 and this is used for personal project work only..', '', '', '2023-05-18 18:26:43', '2147483647', '18-May-2023'),
(9, 2, 6, 'Rossouw blitz puts Punjab Kings on brink of elimination', 'A dazzling display of boundary hitting all around the ground from Rilee Rossouw in his unbeaten 82 off 37, combined with useful contributions from the other Delhi Capitals top-four batters, handed Punjab Kings a 15-run defeat and severely dented their playoff chances.', 'Kings got close to the finish line in the end, thanks to a belligerent 94 off 48 from Liam Livingstone, but he fought a lone battle. The loss kept Kings on the eighth spot with 12 points. They now depend on many other results going their way to stay alive in the playoffs race because they have only one match to go, and three teams are already above 14 points, which is the most Kings can get to.', 'Kings were mostly behind the asking rate right from the start because their only other batter who scored over 25 was Atharva Taide, who struggled for fluency and retired out on 55 off 42 balls. Livingstone\'s pursuit of boundaries in the end kept Kings\' slim hopes alive, whether they needed 79 off 24 or 38 off 12. In the last over too, when they needed 23 from the last three balls, they got a lifeline when Ishant Sharma sent down a no-ball which Livingstone sent for six, making it 16 required from three with a free hit coming. But Livingstone failed to connect with the subsequent full toss and holed out to long-off on the last ball.', 'This content is inspired by https://www.espn.in/cricket/series/8048/report/1359538/punjab-kings-vs-delhi-capitals-64th-match-ipl and this is used for personal project work only..', '', '', '2023-05-18 18:27:49', '2147483647', '18-May-2023'),
(10, 2, 6, 'Dhawan pulls up Punjab quicks for not bowling to plan', 'Shikhar Dhawan, the Punjab Kings captain now left hoping for other results to go their way to make the playoffs of IPL 2023, rued the lack of execution from his bowlers as they were bested by Delhi Capitals in Dharamsala on Wednesday.', 'Shikhar Dhawan, the Punjab Kings captain now left hoping for other results to go their way to make the playoffs of IPL 2023, rued the lack of execution from his bowlers as they were bested by Delhi Capitals in Dharamsala on Wednesday.', 'Shikhar Dhawan, the Punjab Kings captain now left hoping for other results to go their way to make the playoffs of IPL 2023, rued the lack of execution from his bowlers as they were bested by Delhi Capitals in Dharamsala on Wednesday.', 'This content is inspired by https://www.espn.in/cricket/story/_/id/37671407/shikhar-dhawan-pulls-punjab-kings-bowlers-not-bowling-plan and this is used for personal project work only..', '', '', '2023-05-18 18:29:33', '2147483647', '18-May-2023'),
(11, 2, 7, 'Indian women lose 2-4 to Australia in first hockey Test.', 'NEW DELHI: The Indian women\'s hockey team st ..\r\n\r\nRead more at:\r\nhttp://timesofindia.indiatimes.com/articleshow/100331172.cms?utm_source=contentofinterest&utm_medium=text&utm_campaign=cppst', 'NEW DELHI: The Indian women\'s hockey team st ..\r\n\r\nRead more at:\r\nhttp://timesofindia.indiatimes.com/articleshow/100331172.cms?utm_source=contentofinterest&utm_medium=text&utm_campaign=cppst', 'NEW DELHI: The Indian women\'s hockey team st ..\r\n\r\nRead more at:\r\nhttp://timesofindia.indiatimes.com/articleshow/100331172.cms?utm_source=contentofinterest&utm_medium=text&utm_campaign=cppst', 'NEW DELHI: The Indian women\'s hockey team st ..\r\n\r\nRead more at:\r\nhttp://timesofindia.indiatimes.com/articleshow/100331172.cms?utm_source=contentofinterest&utm_medium=text&utm_campaign=cppst', '', '', '2023-05-18 18:31:16', '2147483647', '18-May-2023'),
(12, 3, 1, 'Bhoodan-Gramdan Movement', 'It was a socio-political movement started by Vinoba Bhave in 1951 in India.\r\nVinoba Bhave was a disciple of Mahatma Gandhi who chose him as the first individual Satyagrahi and had actively participated in India\'s Freedom Struggle.\r\nAfter independence, he realized that the issue of landlessness was a major problem faced by rural India and in 1951, he started the Bhoodan Movement or the land gift movement.', 'It aimed to persuade wealthy landowners to donate a portion of their land to landless peasants.\r\nThe movement gained momentum when Bhave walked from village to village, requesting landowners to donate their land.\r\nBhave\'s approach was rooted in the philosophy of non-violence and the idea that the landowners should donate their land out of compassion and empathy for the poor.', 'The next phase of the Bhoodan movement was the Gramdan Movement or the village gift movement.\r\nIt aimed to create self-sufficient villages by bringing about collective ownership of land.\r\nThe Gramdan movement urged villagers to donate their land to a village council, which would then manage and distribute the land to the villagers.\r\nThis movement gained support from many political leaders and was seen as a solution to the problem of unequal distribution of land in rural India.', 'This content is inspired by https://www.drishtiias.com/daily-updates/daily-news-analysis/bhoodan-gramdan-movement and this is used for personal project work only..', '', '', '2023-05-18 18:32:46', '2147483647', '18-May-2023'),
(13, 3, 1, 'Mutiny Memorial tells the Story of 1857 Revolt', 'Mutiny Memorial (New Delhi) was initially built in 1863 to honour those who fought from the British side during the Revolt of 1857 but 25 years after Independence, they re-dedicated it to the memory of those Indians who lost their lives fighting the British.\r\n\r\nThe monument has an indifferent gothic design with arched marble-backed recesses on all sides of the octagonal tower.', 'Indian Revolt of 1857-59 was a widespread but unsuccessful rebellion against the rule of British East India Company in India during Governor General Canning’s regime.\r\nIt was the first expression of organised resistance against the company led by sepoys of the company, eventually securing the participation of the masses.\r\nThe rebellion of 1857 is referred to by various names, including the Sepoy Mutiny (according to British historians), the Indian Mutiny, the Great Rebellion (according to Indian historians), the Indian Insurrection, and the First War of Independence (as per Vinayak Damodar Savarkar).', 'Repression of Grievances: Mangal Pandey\'s refusal to use the cartridges in Barrackpore and subsequent hanging, along with the imprisonment of 85 soldiers in Meerut for similar refusal, were among the incidents that sparked the Revolt of 1857 in India.', 'This content is inspired by https://www.drishtiias.com/daily-updates/daily-news-analysis/mutiny-memorial-tells-the-story-of-1857-revolt and this is used for personal project work only..', '', '', '2023-05-18 18:34:24', '2147483647', '18-May-2023'),
(14, 3, 9, 'Evidence of Ice Age human migrations from China to the Americas and Japan', 'The Asian ancestry of Native Americans is more complicated than previously indicated,\" says first author Yu-Chun Li, a molecular anthropologist at the Chinese Academy of Sciences. \"In addition to previously described ancestral sources in Siberia, Australo-Melanesia, and Southeast Asia, we show that northern coastal China also contributed to the gene pool of Native Americans', 'Though it was long assumed that Native Americans descended from Siberians who crossed over the Bering Strait\'s ephemeral land bridge, more recent genetic, geological, and archeological evidence suggests that multiple waves of humans journeyed to the Americas from various parts of Eurasia.', 'To shed light on the history of Native Americans in Asia, a team of researchers from the Chinese Academy of Sciences followed the trail of an ancestral lineage that might link East Asian Paleolithic-age populations to founding populations in Chile, Peru, Bolivia, Brazil, Ecuador, Mexico, and California. The lineage in question is present in mitochondrial DNA, which can be used to trace kinship through the female line.', 'This content is inspired by https://www.sciencedaily.com/releases/2023/05/230509122008.htm and this is used for personal project work only..', '', '', '2023-05-18 18:35:48', '2147483647', '18-May-2023'),
(15, 3, 10, 'Jallianwala Bagh massacre: What happened to General Dyer after he ordered firing on Indians?', 'On April 13, 1919, what was planned as a protest gathering of Indians in a compound called Jallianwala Bagh in Amritsar, Punjab, in then British-ruled India, witnessed violence that would become one of the most lasting memories of the barbarity of colonial rule.', 'A British Colonel named Reginald Edward Harry Dyer ordered troops to surround the compound, situated between houses and narrow lanes, and launched indiscriminate firing on the assembled men, women and children who lacked the means to escape. Some of them jumped into a well located within the premises to escape the bullets. According to the British, around 400 people were killed in the firing, the youngest of whom was nine-years-old and the oldest was 80. Indian historians peg the toll at 1,000', 'While British rule in India led to numerous atrocities before and after Jallianwala Bagh, the nature of the violence that unfolded on unarmed civilians led to widespread condemnation later, including from British authorities. Wartime British Prime Minister Winston Churchill went on to describe the day as “monstrous” and an inquiry was set up to probe Dyer’s orders.', 'This content is inspired by https://indianexpress.com/article/explained/explained-history/jallianwala-bagh-anniversary-what-happened-to-general-dyer-8554153/ and this is used for personal project work only..', '', '', '2023-05-18 18:37:34', '2147483647', '18-May-2023'),
(16, 3, 10, 'India@75, Looking at 100: What will be the history of India without the history of its plant life?', 'I arrived in India like the way I arrived into language — late. Statistically, India was 27 years old when I came into the world, but to me it seemed that it was as old as language. I thought of it as a child does a parent — that is, I didn’t think of it at all. Every year I heard the same sounds around the time of its birthday (I misunderstood “august occasion” as being related to August 15), about its greatness and how much it still needed to do — I think I equated them with the things children were told on their birthdays.', 'As I moved swiftly from young adulthood to the world, the Indian state began to lose its shyness. While its citizens took to anti-aging creams, India — “Indian culture” — began to change its birth certificate to imply that it was almost as old as time. Ministers started speaking about a golden age where surgery, flying machines and telecommunication were available much before the inventions in the modern world. That was their ambition — to re-create that India. But I did not encounter any such atavistic urge in relation to the plant world.', 'I think of the citizens without Aadhaar cards, those without life insurance and crematoriums, those not on the nation’s census rolls — our plant life. In the 75th year of Indian independence, Siliguri, the sub-Himalayan Bengal town from where I am writing this, lost almost all its trees on the national highway (NH 10) that connects Bagdogra, its airport suburb, to Sikkim. \\', 'This content is inspired by https://indianexpress.com/article/columns/india75-looking-at-100-what-will-be-the-history-of-india-without-the-history-of-its-plant-life-8600646/ and this is used for personal project work only..', '', '', '2023-05-18 18:38:44', '2147483647', '18-May-2023'),
(17, 4, 11, 'Assessing emotions in wild animals', 'A world-first holistic framework for assessing the mental and psychological wellbeing of wild animals has been developed by UTS Chancellor\'s Postdoctoral Research Fellow Dr Andrea Harvey, a veterinarian and animal welfare scientist in the TD School at the University of Technology Sydney.', 'The significance of the study lies in its potential to revolutionise conservation efforts. Instead of focusing solely on population numbers and reproductive success, the research explores the quality of life experienced by wild animals.', 'This shift in perspective could provide crucial early warning signals about species challenges and population declines, leading to more effective conservation strategies.', 'This content is inspired by https://www.sciencedaily.com/releases/2023/05/230517122134.htm and this is used for personal project work only..', '', '', '2023-05-18 18:40:05', '2147483647', '18-May-2023'),
(18, 5, 19, 'The Blue Umbrella', 'The Blue Umbrella is a 1980 Indian novel written by Ruskin Bond.[1] It was adapted into 2005 Hindi film by the same name, directed by Vishal Bhardwaj, which later won the National Film Award for Best Children\'s Film.[2][3] In 2012, the novel was adapted into a comic by Amar Chitra Katha publications, titled, The Blue Umbrella – Stories by Ruskin Bond, and included another story, Angry River.[4] This story appeared in Bond\'s collection of short stories, Children\'s Omnibus.', 'The Blue Umbrella is a 1980 Indian novel written by Ruskin Bond.[1] It was adapted into 2005 Hindi film by the same name, directed by Vishal Bhardwaj, which later won the National Film Award for Best Children\'s Film.[2][3] In 2012, the novel was adapted into a comic by Amar Chitra Katha publications, titled, The Blue Umbrella – Stories by Ruskin Bond, and included another story, Angry River.[4] This story appeared in Bond\'s collection of short stories, Children\'s Omnibus.', 'The Blue Umbrella is a 1980 Indian novel written by Ruskin Bond.[1] It was adapted into 2005 Hindi film by the same name, directed by Vishal Bhardwaj, which later won the National Film Award for Best Children\'s Film.[2][3] In 2012, the novel was adapted into a comic by Amar Chitra Katha publications, titled, The Blue Umbrella – Stories by Ruskin Bond, and included another story, Angry River.[4] This story appeared in Bond\'s collection of short stories, Children\'s Omnibus.', 'This content is inspired by https://en.wikipedia.org/wiki/The_Blue_Umbrella and this is used for personal project work only..', '', '', '2023-05-18 18:42:03', '2147483647', '18-May-2023'),
(19, 5, 19, 'The Room on the Roof', 'It was Bond\'s first literary venture. Bond wrote the novel when he was seventeen[2] and won the John Llewellyn Rhys Prize in 1957.[2][3] The novel revolves around Rusty, an orphaned seventeen-year-old Anglo-Indian boy living in Dehradun. Due to his guardian, Mr Harrison\'s strict ways, he runs away from his home to live with his Indian friends.', 'It was Bond\'s first literary venture. Bond wrote the novel when he was seventeen[2] and won the John Llewellyn Rhys Prize in 1957.[2][3] The novel revolves around Rusty, an orphaned seventeen-year-old Anglo-Indian boy living in Dehradun. Due to his guardian, Mr Harrison\'s strict ways, he runs away from his home to live with his Indian friends.', 'It was Bond\'s first literary venture. Bond wrote the novel when he was seventeen[2] and won the John Llewellyn Rhys Prize in 1957.[2][3] The novel revolves around Rusty, an orphaned seventeen-year-old Anglo-Indian boy living in Dehradun. Due to his guardian, Mr Harrison\'s strict ways, he runs away from his home to live with his Indian friends.', 'This content is inspired by https://en.wikipedia.org/wiki/The_Room_on_the_Roof and this is used for personal project work only..', '', '', '2023-05-18 18:43:00', '2147483647', '18-May-2023'),
(20, 4, 12, 'Whipsnade Zoo getting new enclosure for critically endangered animals', 'The Zoological Society of London (ZSL) submitted plans for two new buildings to house macaques and lowland anoa.\r\n\r\nThe expansion will be located at The Green, which was previously used as stables and paddocks for wild horses.\r\n\r\nThe zoo said the new development would help future-proof the species for future generations.', 'The Zoological Society of London (ZSL) submitted plans for two new buildings to house macaques and lowland anoa.\r\n\r\nThe expansion will be located at The Green, which was previously used as stables and paddocks for wild horses.\r\n\r\nThe zoo said the new development would help future-proof the species for future generations.', 'The Zoological Society of London (ZSL) submitted plans for two new buildings to house macaques and lowland anoa.\r\n\r\nThe expansion will be located at The Green, which was previously used as stables and paddocks for wild horses.\r\n\r\nThe zoo said the new development would help future-proof the species for future generations.', 'This content is inspired by https://www.bbc.com/news/uk-england-beds-bucks-herts-65054123 and this is used for personal project work only..', '', '', '2023-05-18 18:43:45', '2147483647', '18-May-2023'),
(21, 4, 12, 'What is the UN High Seas Treaty and why is it needed?', 'Two-thirds of the world\'s oceans are currently considered international waters.\r\n\r\nThat means all countries have a right to fish, ship and do research there.\r\n\r\nBut until now only about 1% of these waters - known as \"high seas\" - have been protected.\r\n\r\nThis leaves the marine life living in the vast majority of the high seas at risk of exploitation from threats including climate change, overfishing and shipping traffic.', 'Two-thirds of the world\'s oceans are currently considered international waters.\r\n\r\nThat means all countries have a right to fish, ship and do research there.\r\n\r\nBut until now only about 1% of these waters - known as \"high seas\" - have been protected.\r\n\r\nThis leaves the marine life living in the vast majority of the high seas at risk of exploitation from threats including climate change, overfishing and shipping traffic.', 'Two-thirds of the world\'s oceans are currently considered international waters.\r\n\r\nThat means all countries have a right to fish, ship and do research there.\r\n\r\nBut until now only about 1% of these waters - known as \"high seas\" - have been protected.\r\n\r\nThis leaves the marine life living in the vast majority of the high seas at risk of exploitation from threats including climate change, overfishing and shipping traffic.', 'This content is inspired by https://www.bbc.com/news/science-environment-64839763 and this is used for personal project work only..', '', '', '2023-05-18 18:44:41', '2147483647', '18-May-2023'),
(22, 4, 13, 'Wales lynx escape: Zoo \'outraged\' over killing of escaped big cat', 'A Welsh zoo has said it is \"outraged\" after the local council confirmed an escaped lynx had been \"humanely destroyed\".\r\n\r\nLilleth, twice the size of a domestic cat, went on the run for over a week after escaping from Borth Wild Animal Kingdom in Ceredigion, near Aberystwyth, on 29 October.\r\n\r\nDespite “exhaustive efforts” being made to recapture the young animal Ceredigion Council said the decision had been taken after she strayed into a populated area and the risk she posed to the public became “severe”.', 'A Welsh zoo has said it is \"outraged\" after the local council confirmed an escaped lynx had been \"humanely destroyed\".\r\n\r\nLilleth, twice the size of a domestic cat, went on the run for over a week after escaping from Borth Wild Animal Kingdom in Ceredigion, near Aberystwyth, on 29 October.\r\n\r\nDespite “exhaustive efforts” being made to recapture the young animal Ceredigion Council said the decision had been taken after she strayed into a populated area and the risk she posed to the public became “severe”.', 'A Welsh zoo has said it is \"outraged\" after the local council confirmed an escaped lynx had been \"humanely destroyed\".\r\n\r\nLilleth, twice the size of a domestic cat, went on the run for over a week after escaping from Borth Wild Animal Kingdom in Ceredigion, near Aberystwyth, on 29 October.\r\n\r\nDespite “exhaustive efforts” being made to recapture the young animal Ceredigion Council said the decision had been taken after she strayed into a populated area and the risk she posed to the public became “severe”.', 'This content is inspired by https://www.independent.co.uk/news/uk/home-news/escaped-lynx-killed-borth-zoo-lilleth-humanely-destroyed-ceredigion-wales-a8049401.html and this is used for personal project work only..', '', '', '2023-05-18 18:45:27', '2147483647', '18-May-2023'),
(23, 5, 20, 'Love across the Salt Desert', 'The iconic title story of this collection narrates how Najab defies his father; the international border between India and Pakistan and the hostile salt desert of the Rann of Kutch for Fatimah. In ‘When Gandhi Came to Gorakhpur’ Shadilal; a small-time lawyer; dithers over giving up his profession and joining the freedom struggle until his mind is made up for him. And when Sultan Mahmud of Ghazni stints on a few silver coins for the poet Abul Qasim; he is visited by terrible nightmares in ‘Of Abul Qasim’. Love across the Salt Desert; which brings together a selection of Keki Daruwalla’s best-received short fiction;', 'The iconic title story of this collection narrates how Najab defies his father; the international border between India and Pakistan and the hostile salt desert of the Rann of Kutch for Fatimah. In ‘When Gandhi Came to Gorakhpur’ Shadilal; a small-time lawyer; dithers over giving up his profession and joining the freedom struggle until his mind is made up for him. And when Sultan Mahmud of Ghazni stints on a few silver coins for the poet Abul Qasim; he is visited by terrible nightmares in ‘Of Abul Qasim’. Love across the Salt Desert; which brings together a selection of Keki Daruwalla’s best-received short fiction;', 'The iconic title story of this collection narrates how Najab defies his father; the international border between India and Pakistan and the hostile salt desert of the Rann of Kutch for Fatimah. In ‘When Gandhi Came to Gorakhpur’ Shadilal; a small-time lawyer; dithers over giving up his profession and joining the freedom struggle until his mind is made up for him. And when Sultan Mahmud of Ghazni stints on a few silver coins for the poet Abul Qasim; he is visited by terrible nightmares in ‘Of Abul Qasim’. Love across the Salt Desert; which brings together a selection of Keki Daruwalla’s best-received short fiction;', 'This content is inspired by https://books.google.co.in/books/about/Love_across_the_Salt_Desert.html?id=So1bA94hpuIC&source=kp_book_description&redir_esc=y and this is used for personal project work only..', '', '', '2023-05-18 18:48:09', '2147483647', '18-May-2023'),
(24, 5, 21, 'My Story (Das book)', 'My Story is an autobiographical book written by Indian author and poet Kamala Das (also known as Kamala Surayya or Madhavikutty). The book was originally published in Malayalam, titled Ente Katha. The book evoked violent reactions of admiration and criticism among the readers and critics. It remains to date the best-selling woman\'s autobiography in India.\r\n\r\nMy Story is a chronologically ordered, linear narrative written in a realist style. In the book, Das recounts the trials of her marriage and her painful self-awakening as a woman and writer. The entire account written in the format of a novel. Though My Story was supposed to be an autobiography, Das later admitted that there was plenty of fiction in it.[1]\r\n\r\n', 'The book, with 50 chapters, follows Aami\'s (Kamala) life from age four through British colonial and missionary schools in Calcutta where she had to face racist discrimination; through the brutal and indulgent relationship with her husband; through her sexual awakening; her literary career; extramarital affairs; the birth of her children; and, finally, a slow but steady coming to terms with her spouse, writing, and sexuality. She mostly upholds her personal self in her autobiography rather than the political and social upheaval predominant during the war of independence in the then India.', 'The book, with 50 chapters, follows Aami\'s (Kamala) life from age four through British colonial and missionary schools in Calcutta where she had to face racist discrimination; through the brutal and indulgent relationship with her husband; through her sexual awakening; her literary career; extramarital affairs; the birth of her children; and, finally, a slow but steady coming to terms with her spouse, writing, and sexuality. She mostly upholds her personal self in her autobiography rather than the political and social upheaval predominant during the war of independence in the then India.', 'This content is inspired by https://en.wikipedia.org/wiki/My_Story_(Das_book) and this is used for personal project work only..', '', '', '2023-05-18 18:49:17', '2147483647', '18-May-2023'),
(25, 6, 14, 'Is reality a game of quantum mirrors? A new theory suggests it might be', 'Imagine you sit down and pick up your favourite book. You look at the image on the front cover, run your fingers across the smooth book sleeve, and smell that familiar book smell as you flick through the pages. To you, the book is made up of a range of sensory appearances.', 'Imagine you sit down and pick up your favourite book. You look at the image on the front cover, run your fingers across the smooth book sleeve, and smell that familiar book smell as you flick through the pages. To you, the book is made up of a range of sensory appearances.', 'Imagine you sit down and pick up your favourite book. You look at the image on the front cover, run your fingers across the smooth book sleeve, and smell that familiar book smell as you flick through the pages. To you, the book is made up of a range of sensory appearances.', 'This content is inspired by https://theconversation.com/is-reality-a-game-of-quantum-mirrors-a-new-theory-suggests-it-might-be-162936 and this is used for personal project work only..', '', '', '2023-05-18 18:51:06', '2147483647', '18-May-2023'),
(26, 6, 14, 'A new quantum paradox throws the foundations of observed reality into question', 'If a tree falls in a forest and no one is there to hear it, does it make a sound? Perhaps not, some say.\r\n\r\nAnd if someone is there to hear it? If you think that means it obviously did make a sound, you might need to revise that opinion.', 'If a tree falls in a forest and no one is there to hear it, does it make a sound? Perhaps not, some say.\r\n\r\nAnd if someone is there to hear it? If you think that means it obviously did make a sound, you might need to revise that opinion.', 'If a tree falls in a forest and no one is there to hear it, does it make a sound? Perhaps not, some say.\r\n\r\nAnd if someone is there to hear it? If you think that means it obviously did make a sound, you might need to revise that opinion.', 'This content is inspired by https://theconversation.com/a-new-quantum-paradox-throws-the-foundations-of-observed-reality-into-question-144426 and this is used for personal project work only..', '', '', '2023-05-18 18:52:13', '2147483647', '18-May-2023'),
(27, 6, 16, 'De Broglie Wavelength', 'In 1923, a French physics graduate student named Prince Louis-Victor de Broglie (1892–1987) made a radical proposal based on the hope that nature is symmetric. If EM radiation has both particle and wave properties, then nature would be symmetric if matter also had both particle and wave properties', 'In 1923, a French physics graduate student named Prince Louis-Victor de Broglie (1892–1987) made a radical proposal based on the hope that nature is symmetric. If EM radiation has both particle and wave properties, then nature would be symmetric if matter also had both particle and wave properties', 'In 1923, a French physics graduate student named Prince Louis-Victor de Broglie (1892–1987) made a radical proposal based on the hope that nature is symmetric. If EM radiation has both particle and wave properties, then nature would be symmetric if matter also had both particle and wave properties', 'This content is inspired by https://www.texasgateway.org/resource/125-wave-nature-matter and this is used for personal project work only..', '', '', '2023-05-18 18:53:15', '2147483647', '18-May-2023'),
(28, 6, 16, 'Wave Nature of Matter', 'Bohr’s model explained the experimental data for the hydrogen atom and was widely accepted, but it also raised many questions. Why did electrons orbit at only fixed distances defined by a single quantum number n = 1, 2, 3, and so on, but never in between? Why did the model work so well describing hydrogen and one-electron ions, but could not correctly predict the emission spectrum for helium or any larger atoms? To answer these questions, scientists needed to completely revise the way they thought about matter.', 'Bohr’s model explained the experimental data for the hydrogen atom and was widely accepted, but it also raised many questions. Why did electrons orbit at only fixed distances defined by a single quantum number n = 1, 2, 3, and so on, but never in between? Why did the model work so well describing hydrogen and one-electron ions, but could not correctly predict the emission spectrum for helium or any larger atoms? To answer these questions, scientists needed to completely revise the way they thought about matter.', 'Bohr’s model explained the experimental data for the hydrogen atom and was widely accepted, but it also raised many questions. Why did electrons orbit at only fixed distances defined by a single quantum number n = 1, 2, 3, and so on, but never in between? Why did the model work so well describing hydrogen and one-electron ions, but could not correctly predict the emission spectrum for helium or any larger atoms? To answer these questions, scientists needed to completely revise the way they thought about matter.', 'This content is inspired by https://chem.libretexts.org/Courses/College_of_the_Canyons/Chem_201%3A_General_Chemistry_I_OER/09%3A_Electronic_Structure_and_Periodic_Table/9.03%3A_Wave_Nature_of_Matter and this is used for personal project work only..', '', '', '2023-05-18 18:54:08', '2147483647', '18-May-2023'),
(29, 6, 17, 'Chloride in the battery pool', 'The researchers synthesized Li3TiCl6 from LiCl and TiCl3 and, with electrochemical testing, found room-temperature ionic conductivities above 1 mS cm–1. ', 'The researchers synthesized Li3TiCl6 from LiCl and TiCl3 and, with electrochemical testing, found room-temperature ionic conductivities above 1 mS cm–1. ', 'The researchers synthesized Li3TiCl6 from LiCl and TiCl3 and, with electrochemical testing, found room-temperature ionic conductivities above 1 mS cm–1. ', 'This content is inspired by https://www.nature.com/articles/s41557-023-01206-0 and this is used for personal project work only..', '', '', '2023-05-18 18:55:26', '2147483647', '18-May-2023');

-- --------------------------------------------------------

--
-- Table structure for table `clubdiscuss`
--

CREATE TABLE `clubdiscuss` (
  `id` int(255) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `message_by` varchar(255) NOT NULL,
  `club_id` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clubdiscuss`
--

INSERT INTO `clubdiscuss` (`id`, `msg`, `message_by`, `club_id`, `timestamp`) VALUES
(1, 'Hey, Welcome to the technology', '2147483647', '1', '2023-05-16 21:23:49'),
(2, 'Technology Club', '2147483647', '1', '2023-05-18 16:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unique_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `unique_name`, `logo`, `details`, `timestamp`) VALUES
(1, 'TECHNOLOGY', 'technology', '1684252390technology-customer-support1-2000x1200.jpg', 'Technology is the application of knowledge for achieving practical goals in a reproducible way. The word technology can also mean the products resulting from such efforts, including both tangible tools such as utensils or machines, and intangible ones suc', '2023-05-16 21:23:10'),
(2, 'SPORTS', 'sports', '1684252650download (1).jfif', 'Sports occupies a vital role in our lives. It keeps us fit, healthy and makes us active. The secret to having a healthy and positive lifestyle is to have a positive mind and body. ', '2023-05-16 21:27:30'),
(3, 'HISTORY', 'history', '1684252765download (2).jfif', 'The definition of history, is a question which has sparked international debate for centuries between the writers, readers, and the makers of history. It is a vital topic which should be relevant in our lives because it', '2023-05-16 21:29:25'),
(4, 'ANIMALS', 'animals', '1684253046download (4).jfif', 'Weird But True: Marine Animals. Penguin facts and photos. Penguin facts and photos. Surprising sharks. Surprising sharks. Fat Bear Week. Fat Bear Week.\r\n        ', '2023-05-16 21:34:06'),
(5, 'WRITING', 'writing', '1684404915download (6).jfif', 'Writing is a cognitive activity involving neuropsychological and physical processes and the use of writing systems to structure and translate human thoughts into persistent representations of human language', '2023-05-18 15:45:15'),
(6, 'SCIENCE', 'science', '1684404998download (7).jfif', 'Science is the pursuit and application of knowledge and understanding of the natural and social world following a systematic methodology based on evidence. ', '2023-05-18 15:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `contactmessages`
--

CREATE TABLE `contactmessages` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `ip` varchar(50) NOT NULL,
  `timestamp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactmessages`
--

INSERT INTO `contactmessages` (`id`, `name`, `email`, `message`, `ip`, `timestamp`) VALUES
(1, 'Dinesh Kuniyal', 'dineshkuniyal20@gmail.com', 'Namaste Duniya', '172.24.0.1', '2022-09-30 19:36:27'),
(2, 'Dinesh Kuniyal', 'dineshkuniyal20@gmail.com', 'Namaste Duniya', '172.24.0.1', '2022-09-30 19:56:33'),
(3, 'Dinesh', 'dineshkuniyal0@gmail.com', 'Hello', '172.24.0.1', '2022-09-30 20:09:16'),
(4, 'Dinesh Kuniyal', 'dineshkuniyal0@gmail.com', 'hey', '172.24.0.1', '2023-05-18 16:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(255) NOT NULL,
  `user_one` varchar(255) NOT NULL,
  `user_two` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_one`, `user_two`, `timestamp`) VALUES
(1, '2147483647', '2', '2023-05-18 20:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(255) NOT NULL,
  `liked_by` varchar(255) NOT NULL,
  `article_id` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `liked_by`, `article_id`, `timestamp`) VALUES
(3, '2147483647', '1', '2023-05-18 16:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_destination` varchar(255) NOT NULL,
  `php_file_type` varchar(50) NOT NULL,
  `js_file_type` varchar(50) NOT NULL,
  `timestamp` varchar(50) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `File_Size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `name`, `file_destination`, `php_file_type`, `js_file_type`, `timestamp`, `created_date`, `File_Size`) VALUES
(1, 'download (16).jfif', '21684423581download (16).jfif', 'image/jpeg', 'image/jpeg', '2023-05-18 20:56:21', '18-May-2023 08:56 PM', '8.7 KB'),
(2, 'download.jfif', '21474836471684423626download.jfif', 'image/jpeg', 'image/jpeg', '2023-05-18 20:57:06', '18-May-2023 08:57 PM', '7.74 KB');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `message_by` varchar(255) NOT NULL,
  `message_to` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'TEXT',
  `file_id` varchar(1000) DEFAULT NULL,
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `msg`, `message_by`, `message_to`, `status`, `type`, `file_id`, `timestamp`) VALUES
(1, 'hi', '2147483647', '2', 'SEEN', 'TEXT', NULL, '2023-05-18 20:55:29'),
(2, 'hello', '2', '2147483647', 'SEEN', 'TEXT', NULL, '2023-05-18 20:55:48'),
(3, 'download (16).jfif', '2', '2147483647', 'SEEN', 'FILE', '21684423581download (16).jfif', '2023-05-18 20:56:21'),
(4, 'download.jfif', '2147483647', '2', 'SEEN', 'FILE', '21474836471684423626download.jfif', '2023-05-18 20:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(255) NOT NULL,
  `sent_by` varchar(255) NOT NULL,
  `sent_to` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'UNSEEN',
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(255) NOT NULL,
  `request_by` varchar(255) NOT NULL,
  `request_to` varchar(255) NOT NULL,
  `datetimestamp` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `name` text NOT NULL,
  `age` int(20) NOT NULL,
  `gender` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `other` varchar(11) NOT NULL,
  `dt` varchar(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suggest`
--

CREATE TABLE `suggest` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `opinion` text NOT NULL,
  `timestamp` varchar(50) NOT NULL,
  `uname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `topicdiscuss`
--

CREATE TABLE `topicdiscuss` (
  `id` int(255) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `message_by` varchar(255) NOT NULL,
  `topic_id` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topicdiscuss`
--

INSERT INTO `topicdiscuss` (`id`, `msg`, `message_by`, `topic_id`, `timestamp`) VALUES
(1, 'The Age of A.I is here...!', '2147483647', '2', '2023-05-17 19:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `club_id` int(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `logo`, `details`, `club_id`, `timestamp`) VALUES
(1, 'Modern history', '1684252849download (3).jfif', 'History is the study of past events leading up to the present day. It is a research, a narrative, or an account of past events and developments that are commonly related to a person, an institution, or a place. It is a branch of knowledge that records and', 3, '2023-05-16 21:30:49'),
(2, 'THE AGE OF A.I', '1684333585download.jfif', 'The first time was in 1980, when I was introduced to a graphical user interface—the forerunner of every modern operating system, including Windows. I sat with the person who had shown me the demo, a brilliant programmer named Charles Simonyi, and we immed', 1, '2023-05-17 19:56:25'),
(3, 'Football', '1684333784download (5).jfif', 'The first time was in 1980, when I was introduced to a graphical user interface—the forerunner of every modern operating system, including Windows. I sat with the person who had shown me the demo, a brilliant programmer named Charles Simonyi, and we immed', 2, '2023-05-17 19:59:44'),
(4, 'Blockchain', '1684405053download (8).jfif', 'Blockchain.com is a cryptocurrency financial services company. The company began as the first Bitcoin blockchain explorer in 2011 and later created a cryptocurrency wallet that accounted for 28% of bitcoin transactions between 2012 and 2020.', 1, '2023-05-18 15:47:33'),
(5, 'Cyber Security', '1684405094download (9).jfif', 'Cyber security refers to every aspect of protecting an organization and its employees and assets against cyber threats. As cyberattacks become more common and sophisticated and corporate networks grow more complex, a variety of cyber security solutions ar', 1, '2023-05-18 15:48:14'),
(6, 'Cricket', '1684405142download (10).jfif', 'Cricket was introduced to North America via the English colonies as early as the 17th century, and in the 18th century it arrived in other parts of the globe.', 2, '2023-05-18 15:49:02'),
(7, 'Hockey', '1684405186download (11).jfif', 'It is the most popular sport in Canada, Finland, Latvia, the Czech Republic, and Slovakia. Ice hockey is the national sport of Latvia and the national winter sport of Canada. Ice hockey is played at a number of levels, by all ages.', 2, '2023-05-18 15:49:46'),
(9, 'Ancient History', '1684405288download (12).jfif', 'Ancient history is a time period from the beginning of writing and recorded human history to as far as late antiquity. ', 3, '2023-05-18 15:51:28'),
(10, 'Indian', '1684405331download (13).jfif', 'The mature Indus civilisation flourished from about 2600 to 1900 BCE, marking the beginning of urban civilisation on the Indian subcontinent. The civilisation included cities such as Harappa, Ganweriwal, and Mohenjo-daro in modern-day Pakistan, and Dholav', 3, '2023-05-18 15:52:11'),
(11, 'Endangered Species', '1684405485Bufo_periglenes2.jpg', 'An endangered species is a species that is very likely to become extinct in the near future, either worldwide or in a particular political jurisdiction. Endangered species may be at risk due to factors such as habitat loss, poaching and invasive species.', 4, '2023-05-18 15:54:45'),
(12, 'Rare Species', '1684406224download (14).jfif', 'A rare species is a group of organisms that are very uncommon, scarce, or infrequently encountered. This designation may be applied to either a plant or animal taxon, and is distinct from the term endangered or threatened.', 4, '2023-05-18 16:07:04'),
(13, 'Dangerous Animals', '1684406320download (15).jfif', 'Most people have one animal phobia or another, be it a fear of sharks thanks to sensationalist blockbusters or a horror of anything that creeps and crawls—but when it comes to which species are worth being afraid of? The answer might surprise you.', 4, '2023-05-18 16:08:40'),
(14, 'Meta Physics', '1684406400download (16).jfif', 'Metaphysics is the branch of philosophy that studies the fundamental nature of reality, including the first principles of: being or existence, identity and change, space and time, cause and effect, necessity, and possibility.', 6, '2023-05-18 16:10:00'),
(16, 'Wave Nature', '1684406471download (17).jfif', 'In physics, the wave nature of matter is the idea that objects are composed of particles that move in waves. ', 6, '2023-05-18 16:11:11'),
(17, 'Electrochemistry', '1684406521images.png', 'Electrochemistry is the study of electron movement in an oxidation or reduction reaction at a polarized electrode surface.', 6, '2023-05-18 16:12:01'),
(19, 'Ruskin Bond', '1684406664download (18).jfif', 'Ruskin Bond is an Indian author. His first novel, The Room on the Roof, was published in 1956, and it received the John Llewellyn Rhys Prize in 1957.', 5, '2023-05-18 16:14:24'),
(20, 'Keki N. Daruwalla', '1684406716download (19).jfif', 'Keki N. Daruwalla is an Indian poet and short story writer in English. He is also a former Indian Police Service officer. ', 5, '2023-05-18 16:15:16'),
(21, 'Kamala Suraiyya', '1684406814download (20).jfif', 'Kamala Surayya, popularly known by her one-time pen name Madhavikutty and married name Kamala Das, was an Indian poet in English as well as an author in Malayalam from Kerala, India.', 5, '2023-05-18 16:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `datetimestamp` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `verified` varchar(255) NOT NULL,
  `ROTP` varchar(255) NOT NULL,
  `joined` varchar(255) NOT NULL,
  `about` varchar(1000) NOT NULL,
  `CoverImg` varchar(255) NOT NULL,
  `ProfileImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `user_type`, `password`, `user_id`, `datetimestamp`, `verified`, `ROTP`, `joined`, `about`, `CoverImg`, `ProfileImg`) VALUES
(3, 'OPIVERSE', 'OPIVERSE', 'dineshkuniyal20gmail.com', 'writer', 'e807f1fcf82d132f9bb018ca6738a19f', 2147483647, '2022-10-01 08:15:18', 'YES', '400634', '01 October 2022', 'A peaceful Soul', '16842514162147483647hallway-with-bag-floor.jpg', ''),
(4, 'Dinesh Kuniyal', 'dinesh_kuniyal', 'dineshkuniyal20@gmail.com', 'reader', '6eea9b7ef19179a06954edd0f6c05ceb', 2, '2023-05-18 19:32:13', 'YES', '250784', '18-May-23', 'Hey, I am new here', '16844207932hallway-with-bag-floor.jpg', '16844208052library.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubdiscuss`
--
ALTER TABLE `clubdiscuss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactmessages`
--
ALTER TABLE `contactmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggest`
--
ALTER TABLE `suggest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topicdiscuss`
--
ALTER TABLE `topicdiscuss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `clubdiscuss`
--
ALTER TABLE `clubdiscuss`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactmessages`
--
ALTER TABLE `contactmessages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suggest`
--
ALTER TABLE `suggest`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topicdiscuss`
--
ALTER TABLE `topicdiscuss`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
