<?php

    namespace App\Services;

    use App\Models\Characters\Arena;
    use App\Models\CharactersTalent;
    use App\Models\Characters\Characters;
    use App\Models\Classes;
    use App\Models\Talent;
    use App\Models\Talents;
    use App\Services\Parser\Images;
    use Illuminate\Support\Facades\DB;

    class Utils {

        public static function mythicKeystoneDungeons() {
            return [
            "season" => 1,"expansion" => "Темные Земли","dungeons" => [["dungeon" => ["background" => ["url" => "https://render-eu.worldofwarcraft.com/zones/mists-of-tirna-scithe-large.jpg"],"bossEncounters" => [["description" => "Обреченные на существование вне цикла жизни и смерти, друсты надеются изменить свою судьбу с помощью возрождающих методик Арденвельда. Этот поход привел их в Тирна Скитт, где ингра Малох и его последователи поработили местных жителей с помощью нечестивой магии.","id" => 2400,"location" => "Туманы Тирна Скитта","name" => "Ингра Малох","urlSlug" => "ingra-maloch"],["description" => "Защитники Тирна Скитта полагаются не только на силу оружия, но и на хитроумные уловки. Озорная Призывательница Тумана при помощи чар сбивает с толку врагов. После вторжения друстов ей самой трудно отличить врагов от друзей, поэтому чтобы добраться до сердца Тирна Скитта, вам придется сыграть в ее игру и разгадать несколько головоломок.","id" => 2402,"location" => "Туманы Тирна Скитта","name" => "Призывательница Туманов","urlSlug" => "mistcaller"],["description" => "Гормы гложут окраины Арденвельда, пожирая иссушенные останки мертвых существ, но тварь по имени Тред'ова обнаружила нечто куда более ценное =>  дикое семя Лакали, лоа знаний. Попробовав на вкус силу и мудрость лоа, Тред'ова возжелала большего, чем просто выживание.","id" => 2405,"location" => "Туманы Тирна Скитта","name" => "Тред'ова","urlSlug" => "tredova"]],"category" => ["enum" => "DUNGEON","id" => 0,"name" => "Dungeon","slug" => "dungeon"],"description" => "Ночной народец всегда защищал цветущую рощу Тирна Скитт – священное место, таящее древние секреты. Легенда гласит, что неосторожные путники могут навеки заблудиться в этих залитых туманом тропах. Но теперь, когда Арденвельд ослаблен засухой, враги хотят присвоить себе могучую магию рощи, и даже исконные обитатели лесного царства сходят с ума от голода и отчаяния и пытаются поглотить то, чем так дорожит Королева Зимы.","expansion" => "Темные Земли","id" => 1184,"levelMin" => 60,"location" => "Арденвельд","modes" => ["NORMAL","HEROIC","MYTHIC","MYTHIC_KEYSTONE"],"name" => "Туманы Тирна Скитта","screenshot" => ["url" => "http => //eu.battle.net/wow/static/images/wiki/zone/screenshots/mists-of-tirna-scithe.jpg"],"slug" => "mists-of-tirna-scithe","thumbnail" => ["url" => "https://render-eu.worldofwarcraft.com/zones/mists-of-tirna-scithe-small.jpg"],"url" => "/character/tarren-mill/Dotaone/pve/mythic/mists-of-tirna-scithe/details.frag"]],["dungeon" => ["background" => ["url" => "https://render-eu.worldofwarcraft.com/zones/the-necrotic-wake-large.jpg"],"bossEncounters" => [["description" => "Грузная туша Чумокоста была любовно сшита хирургом Трупошвом из кусков гнилого мяса. Теперь это поганище с нетерпением ждет, когда его спустят на защитников храма Отваги.","id" => 2395,"location" => "Смертельная тризна","name" => "Чумокост","urlSlug" => "blightbone"],["description" => "Амарт парит в небе на чудовищном Костеклыке, наблюдая за тем, как его ученики и подмастерья собирают тела для экспериментов. Этот жестокий командир убил десницу Отваги – и теперь готовится уничтожить идеала.","id" => 2391,"location" => "Смертельная тризна","name" => "Амарт Жнец","urlSlug" => "amarth-the-harvester"],["description" => "Хирург Трупошов – творец всех отвратительных поганищ, что выходят из летающей крепости \"Золрамус\". С маниакальной одержимостью он сшивает плоть павших врагов и создает кадавров, готовых сражаться за Малдраксус.","id" => 2392,"location" => "Смертельная тризна","name" => "Хирург Трупошов","urlSlug" => "surgeon-stitchflesh"],["description" => "Налтор Криомант командует силами вторжения с вершины летающего зиккурата \"Золрамус\". Коварный лич готов обрушить ледяную смерть на нетронутые порчей земли Бастиона.","id" => 2396,"location" => "Смертельная тризна","name" => "Налтор Криомант","urlSlug" => "nalthor-the-rimebinder"]],"category" => ["enum" => "DUNGEON","id" => 0,"name" => "Dungeon","slug" => "dungeon"],"description" => "Совершив неслыханный акт предательства, силы Малдраксуса – мира, который должен защищать Темные Земли – вторглись в храм Отваги. Они украли аниму и забрали тела убитых кирий, чтобы использовать их для своих темных ритуалов. Если некромантов с \"Золрамуса\" не остановить, они разграбят весь Бастион, оставив за собой лишь смерть и разрушение.","expansion" => "Темные Земли","id" => 1182,"levelMin" => 60,"location" => "Бастион","modes" => ["NORMAL","HEROIC","MYTHIC","MYTHIC_KEYSTONE"],"name" => "Смертельная тризна","screenshot" => ["url" => "http => //eu.battle.net/wow/static/images/wiki/zone/screenshots/the-necrotic-wake.jpg"],"slug" => "the-necrotic-wake","thumbnail" => ["url" => "https://render-eu.worldofwarcraft.com/zones/the-necrotic-wake-small.jpg"],"url" => "/character/tarren-mill/Dotaone/pve/mythic/the-necrotic-wake/details.frag"]],["dungeon" => ["background" => ["url" => "https://render-eu.worldofwarcraft.com/zones/de-other-side-large.jpg"],"bossEncounters" => [["description" => "Хаккар Свежеватель Душ стал причиной многих бедствий на Азероте. Его власть была огромной, а зараженная кровь несла смерть; фанатичные слуги Хаккара сражались за него до самой смерти и даже после нее. И он никогда не поступался ни крупицей силы – ни своей, ни чужой.","id" => 2408,"location" => "Та Сторона","name" => "Хаккар Свежеватель Душ","urlSlug" => "hakkar-the-soulflayer"],["description" => "Абсолютная честность и доверие – вот что делает Миллифисент и Миллхауса Манаштормов такой идеальной парой. Вернее... честность, доверие, умопомрачительная магия и экспериментальные технологии. Эти четыре вещи, объединенные в идеальной гармонии, делают Манаштормов самой смертоносной, опасной и разрушительной парочкой во всех мирах.","id" => 2409,"location" => "Та Сторона","name" => "Манаштормы","urlSlug" => "the-manastorms"],["description" => "Дилер Зи'екса – хитрая стяжательница, за многие тысячелетия накопившая большой арсенал магических приспособлений. Манипулируя пространством, она всегда оказывается на шаг впереди своих многочисленных врагов, нажитых в процессе торговли.","id" => 2398,"location" => "Та Сторона","name" => "Дилер Зи'екса","urlSlug" => "dealer-xyexa"],["description" => "Отец Сна, Сын Времени и Друг Ночи, Мве'зала провожал души обитателей Азерота в мир иной задолго до того, как Бвонсамди заключил свою первую сделку. Он знает, что бог должен повелевать, а не договариваться со своими слугами и почитателями. И скоро он вернет свою силу, осуществив план, составленный еще на заре времен – как только разберется со взбунтовавшимся преемником.","id" => 2410,"location" => "Та Сторона","name" => "Мве'зала","urlSlug" => "muehzala"]],"category" => ["enum" => "DUNGEON","id" => 0,"name" => "Dungeon","slug" => "dungeon"],"description" => "У Бвонсамди есть потайной уголок в Темных Землях, который он называет Та Сторона. Когда мертвые стали попадать в Утробу, Бвонсамди укрыл в этих маленьких владениях своих верных троллей, спасая их от общей участи. Тем самым он нарушил старую сделку с Мве'залой, и теперь древний лоа явился, чтобы собрать урожай душ и покончить с их хранителем. Чтобы отразить это нападение и защитить своих последователей, Бвонсамди просит помочь ему собрать старые долги.","expansion" => "Темные Земли","id" => 1188,"levelMin" => 60,"location" => "Арденвельд","modes" => ["NORMAL","HEROIC","MYTHIC","MYTHIC_KEYSTONE"],"name" => "Та Сторона","screenshot" => ["url" => "http => //eu.battle.net/wow/static/images/wiki/zone/screenshots/de-other-side.jpg"],"slug" => "de-other-side","thumbnail" => ["url" => "https://render-eu.worldofwarcraft.com/zones/de-other-side-small.jpg"],"url" => "/character/tarren-mill/Dotaone/pve/mythic/de-other-side/details.frag"]],["dungeon" => ["background" => ["url" => "https://render-eu.worldofwarcraft.com/zones/halls-of-atonement-large.jpg"],"bossEncounters" => [["description" => "Камни грехов должны быть простым напоминанием о былых проступках души – но козни злонравных вентиров наполнили их энергией Халкиаса, огромного голема, и он пробудился к жизни. Слуги Лорд-камергера пытаются удержать голема под контролем, распределяя его аниму между несколькими осколками.","id" => 2406,"location" => "Чертоги Покаяния","name" => "Халкиас, запятнанный грехом голиаф","urlSlug" => "halkias-the-sinstained-goliath"],["description" => "Могучий камнерожденный, известный как Эшелон, не доверяет чужакам и особенно не любит смертных. Он охраняет Чертоги Покаяния, следя за ними с небес, и сокрушит любого, кто посмеет переступить их порог.","id" => 2387,"location" => "Чертоги Покаяния","name" => "Эшелон","urlSlug" => "echelon"],["description" => "В глубине Чертогов Покаяния – за внутренним двором, за спинами бдительных горгулий – скрывается церковь, не похожая ни на одно святилище Азерота. Здесь верховный адъюдикатор наставляет вверившиеся ей души, распространяя темное учение сира Денатрия.","id" => 2411,"location" => "Чертоги Покаяния","name" => "Верховный адъюдикатор Ализа","urlSlug" => "high-adjudicator-aleez"],["description" => "Лорд-камергер последовательно и неумолимо поднимался на вершину иерархии вентиров, пока наконец не стал Жнецом, взяв в плен мятежную Обвинительницу. Теперь он правит в ее бывших владениях, запасая аниму и извращая священный процесс очищения душ во имя своих грязных целей.","id" => 2413,"location" => "Чертоги Покаяния","name" => "Лорд-камергер","urlSlug" => "lord-chamberlain"]],"category" => ["enum" => "DUNGEON","id" => 0,"name" => "Dungeon","slug" => "dungeon"],"description" => "Под руководством Обвинительницы Чертоги Покаяния служили древней цели Ревендрета. Их своды непрерывно оглашали крики страдания – но это было необходимо для того, чтобы грешники могли искупить свои грехи и не попасть в Утробу. Однако недавно возвысившегося Лорд-камергера заботит лишь одно =>  вытянуть как можно больше анимы, даже ценой возможного спасения души. Кто-то должен покончить с этой порочной практикой.","expansion" => "Темные Земли","id" => 1185,"levelMin" => 60,"location" => "Ревендрет","modes" => ["NORMAL","HEROIC","MYTHIC","MYTHIC_KEYSTONE"],"name" => "Чертоги Покаяния","screenshot" => ["url" => "http => //eu.battle.net/wow/static/images/wiki/zone/screenshots/halls-of-atonement.jpg"],"slug" => "halls-of-atonement","thumbnail" => ["url" => "https://render-eu.worldofwarcraft.com/zones/halls-of-atonement-small.jpg"],"url" => "/character/tarren-mill/Dotaone/pve/mythic/halls-of-atonement/details.frag"]],["dungeon" => ["background" => ["url" => "https://render-eu.worldofwarcraft.com/zones/plaguefall-large.jpg"],"bossEncounters" => [["description" => "Возможно, природа мора и слизи, что вырвались на свободу после падения дома Чумы, так и останется загадкой для всех. Ожившая масса разлагающейся плоти, известная как Склизгл, яростно охраняет руины, чтобы никто не завладел самым мощным штаммом.","id" => 2419,"location" => "Чумные каскады","name" => "Склизгл","urlSlug" => "globgrog"],["description" => "Разрушение дома Чумы и последовавшие за этим извержения слизи не мешают гениальному, как он сам утверждает, доктору Икусу продолжать свои безумные эксперименты.","id" => 2403,"location" => "Чумные каскады","name" => "Доктор Икус","urlSlug" => "doctor-ickus"],["description" => "Домина Отравленный Клинок считает, что Чумные каскады скрывают то, что позволит ей отомстить за гибель дома Глаз. И никто, даже ее бывшие союзники, не помешает ей завладеть оружием в этих руинах.","id" => 2423,"location" => "Чумные каскады","name" => "Домина Отравленный Клинок","urlSlug" => "domina-venomblade"],["description" => "Считалось, что маркграфиня Страдама погибла при взрыве, уничтожившем ее дом. На самом деле взрыв превратил ее в чудовище и свел с ума. Теперь она нашла себе новое место обитания в самом сердце павшего дома Чумы.","id" => 2404,"location" => "Чумные каскады","name" => "Маркграфиня Страдама","urlSlug" => "margrave-stradama"]],"category" => ["enum" => "DUNGEON","id" => 0,"name" => "Dungeon","slug" => "dungeon"],"description" => "В глубине под разрушенным домом Чумы ждет своего часа самое страшное оружие Малдраксуса. Желающие завладеть им должны обыскать зачумленные развалины, чтобы добраться до заветного приза раньше остальных. От того, кто победит в этой гонке, зависит будущее всех Темных Земель.","expansion" => "Темные Земли","id" => 1183,"levelMin" => 60,"location" => "Малдраксус","modes" => ["NORMAL","HEROIC","MYTHIC","MYTHIC_KEYSTONE"],"name" => "Чумные каскады","screenshot" => ["url" => "http => //eu.battle.net/wow/static/images/wiki/zone/screenshots/plaguefall.jpg"],"slug" => "plaguefall","thumbnail" => ["url" => "https://render-eu.worldofwarcraft.com/zones/plaguefall-small.jpg"],"url" => "/character/tarren-mill/Dotaone/pve/mythic/plaguefall/details.frag"]],["dungeon" => ["background" => ["url" => "https://render-eu.worldofwarcraft.com/zones/sanguine-depths-large.jpg"],"bossEncounters" => [["description" => "Криксис Ненасытный давно учуял аниму, заключенную в Кровавых катакомбах, и желание поглотить эту энергию сводило его с ума. Образовавшийся в Ревендрете разлом позволил Криксису проникнуть в катакомбы, и теперь он намерен поглотить всю аниму в подземном хранилище до последней капли.","id" => 2388,"location" => "Кровавые катакомбы","name" => "Криксис Ненасытный","urlSlug" => "kryxis-the-voracious"],["description" => "Многие вентиры считают, что пытать подопечных, вытягивая из них аниму вместе с грехами, – их священный долг. То, что вершителя Тарвольда сделали тюремщиком и позволили ему вдоволь наслаждаться мучениями заключенных, показывает всю глубину падения Ревендрета.","id" => 2415,"location" => "Кровавые катакомбы","name" => "Вершитель Тарвольд","urlSlug" => "executor-tarvold"],["description" => "Лишь самые древние души в Темных Землях могут вспомнить, стала ли верховная надзирательница Бериллия такой безжалостной в Ревендрете – или это был один из ее грехов еще при жизни. Сейчас жестокость, которая помогла ей овладеть магией анимы, обращена на новую пленницу – наару Зе'рали. Бериллия не остановится ни перед чем, чтобы подчинить себе силу Света.","id" => 2421,"location" => "Кровавые катакомбы","name" => "Верховная надзирательница Бериллия","urlSlug" => "grand-proctor-beryllia"],["description" => "Генерал Кааль – одна из главнокомандующих сира Денатрия, координирующая его операции в Ревендрете. Сильная, ловкая, наделенная острым умом и щедро усиленная анимой, она готова уничтожить всех и каждого, кто встанет на пути ее господина.","id" => 2407,"location" => "Кровавые катакомбы","name" => "Генерал Кааль","urlSlug" => "general-kaal"]],"category" => ["enum" => "DUNGEON","id" => 0,"name" => "Dungeon","slug" => "dungeon"],"description" => "В глубинах замка Нафрия находятся Кровавые катакомбы – тюрьма, построенная сиром Денатрием для самых необычных пленников. Здесь они томятся тысячелетиями, пока слуги Владыки вытягивают и изучают их аниму. Мятежники из Грехопада знают об одной пленнице, которая может склонить чашу весов в войне с Денатрием на их сторону, и просят о помощи, чтобы спасти ее.","expansion" => "Темные Земли","id" => 1189,"levelMin" => 60,"location" => "Ревендрет","modes" => ["NORMAL","HEROIC","MYTHIC","MYTHIC_KEYSTONE"],"name" => "Кровавые катакомбы","screenshot" => ["url" => "http => //eu.battle.net/wow/static/images/wiki/zone/screenshots/sanguine-depths.jpg"],"slug" => "sanguine-depths","thumbnail" => ["url" => "https://render-eu.worldofwarcraft.com/zones/sanguine-depths-small.jpg"],"url" => "/character/tarren-mill/Dotaone/pve/mythic/sanguine-depths/details.frag"]],["dungeon" => ["background" => ["url" => "https://render-eu.worldofwarcraft.com/zones/spires-of-ascension-large.jpg"],"bossEncounters" => [["description" => "Пока кирийским претендентам приходится откладывать свое перерождение до окончания засухи, раскольники продолжают получать крылья. Кин-Тара проявила себя в рядах темных кирий и стала грозной небесной воительницей сразу после перерождения. Пока она может сражаться, Шпили Перерождения будут принадлежать Девии.","id" => 2399,"location" => "Шпили Перерождения","name" => "Кин-Тара","urlSlug" => "kintara"],["description" => "\"Вентунакс\" – одна из самых смертоносных автоматонов раскольников. Изначально она была создана для того, чтобы испытывать храбрость кирийских претендентов. Ее движения так стремительны, что, срываясь с места, она на какое-то время становится невидимой.","id" => 2416,"location" => "Шпили Перерождения","name" => "\"Вентунакс\"","urlSlug" => "ventunax"],["description" => "\"Орифрион\" – главное оружие авангарда идеала Верности. Ее усиленные анимой орудия подавили защитников города во время вторжения, и теперь темный колосс яростно защищает источник энергии перед престолом Архонта.","id" => 2414,"location" => "Шпили Перерождения","name" => "\"Орифрион\"","urlSlug" => "oryphrion"],["description" => "Девия была воплощением верности, пока в Бастион не прибыла одна душа с кошмарным прошлым. Девию начали одолевать сомнения – и в конце концов она подняла восстание, приняв помощь от самой мрачной силы Темных Земель. Захватив Шпили Перерождения, она готова завершить начатое и уничтожить Архонта.","id" => 2412,"location" => "Шпили Перерождения","name" => "Девия, идеал Сомнения","urlSlug" => "devos-paragon-of-doubt"]],"category" => ["enum" => "DUNGEON","id" => 0,"name" => "Dungeon","slug" => "dungeon"],"description" => "Вознесшиеся к облакам Шпили Перерождения – средоточие силы Архонта и олицетворение высоких идеалов Бастиона. Правительница Бастиона много эпох пользовалась непререкаемым авторитетом среди кирий, воплощая собой добродетели долга и служения. Но ее власть оказалась под угрозой после того, как засуха анимы вызвала смуту среди перерожденных и заставила многих из них усомниться в вере, а одна из самых преданных последовательниц Архонта поддалась влиянию темных сил.","expansion" => "Темные Земли","id" => 1186,"levelMin" => 60,"location" => "Бастион","modes" => ["NORMAL","HEROIC","MYTHIC","MYTHIC_KEYSTONE"],"name" => "Шпили Перерождения","screenshot" => ["url" => "http => //eu.battle.net/wow/static/images/wiki/zone/screenshots/spires-of-ascension.jpg"],"slug" => "spires-of-ascension","thumbnail" => ["url" => "https://render-eu.worldofwarcraft.com/zones/spires-of-ascension-small.jpg"],"url" => "/character/tarren-mill/Dotaone/pve/mythic/spires-of-ascension/details.frag"]],["dungeon" => ["background" => ["url" => "https://render-eu.worldofwarcraft.com/zones/theater-of-pain-large.jpg"],"bossEncounters" => [["description" => "Чемпионы не сражаются с кем попало. Сначала претенденты бьются друг с другом, чтобы выявить самых достойных. Мастера разных стилей боя Дессия Обезглавливательница, Пакиран Заразный и Сатель Злосчастный объединили усилия, чтобы избавиться от конкурентов. Они сокрушат всех, кто встанет между ними и боем за звание чемпиона.","id" => 2397,"location" => "Театр Боли","name" => "Оскорбление претендентов","urlSlug" => "an-affront-of-challengers"],["description" => "Кровороуб всегда готов одержать еще одну победу и раздобыть еще пару частей, чтобы доказать всем, что дом Кадавров создает лучших воинов. Со своего прибытия в Малдраксус он добыл в бою все части своего тела, но с удовольствием отрубит еще что-нибудь у тех, кто бросит ему вызов.","id" => 2401,"location" => "Театр Боли","name" => "Кроворуб","urlSlug" => "gorechop"],["description" => "Ксав одержал столько побед, что все желающие бросить ему вызов должны сначала проявить себя. Если кто-то выдержит достаточно боев, Ксав будет рад встрече с достойным соперником.","id" => 2390,"location" => "Театр Боли","name" => "Ксав Несломленный","urlSlug" => "xav-the-unfallen"],["description" => "Кул'тарок – мастер некромантии, доказавшая, что грубой силы недостаточно, чтобы подняться на вершину. Путь к победе ведет через лабиринт магических порталов под шквал некротических заклинаний.","id" => 2389,"location" => "Театр Боли","name" => "Кул'тарок","urlSlug" => "kultharok"],["description" => "Непрерывные битвы и бесконечные победы – Мордрета одолела всех, кто осмеливался бросить ей вызов. Она была мастером темной магии при жизни и расширила свои познания в Малдраксусе. Станет ли этот бой за титул тем событием, которого давно ждал Театр Боли?","id" => 2417,"location" => "Театр Боли","name" => "Мордрета, Вечная императрица","urlSlug" => "mordretha-the-endless-empress"]],"category" => ["enum" => "DUNGEON","id" => 0,"name" => "Dungeon","slug" => "dungeon"],"description" => "В Малдраксусе каждый должен все время испытывать себя и доказывать свою готовность защищать Темные Земли. И лучшее место для этого – Театр Боли, где армии претендентов сражаются друг с другом в надежде сойтись в поединке с одним из чемпионов. Жестокость! Анархия! Насилие! И, конечно, боль! Только самые сильные бойцы становятся защитниками своих домов, и лишь один из них может стать чемпионом арены.","expansion" => "Темные Земли","id" => 1187,"levelMin" => 60,"location" => "Малдраксус","modes" => ["NORMAL","HEROIC","MYTHIC","MYTHIC_KEYSTONE"],"name" => "Театр Боли","screenshot" => ["url" => "http => //eu.battle.net/wow/static/images/wiki/zone/screenshots/theater-of-pain.jpg"],"slug" => "theater-of-pain","thumbnail" => ["url" => "https://render-eu.worldofwarcraft.com/zones/theater-of-pain-small.jpg"],"url" => "/character/tarren-mill/Dotaone/pve/mythic/theater-of-pain/details.frag"]]]
    ];
        }

        public static function statsForClass($class) {

            switch($class) {

                default:
                   return ["enum" => "MANA","slug" => "mana","value" => ["type" => "WHOLE","value" => 100000]];
                break;

                case "3":

                break;

                case "6":

                break;

                case "12":

                break;

                case "11":
                    return [
                        "enum" => "INSANITY","slug" => "insanity","value" => ["type" => "WHOLE","value" => 10000000]
                    ];
                break;
            }
        }

        public static function statsChar($health, $class)
        {
            return [
                "basic" => [
                    "primary" => [
                        [
                            "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                        ],
                        self::statsForClass($class),
                        [
                            "enum" => "ITEMLEVEL","slug" => "item-level","value" => ["type" => "WHOLE","value" => 188]
                        ],
                        [
                            "details" => [
                                "base" => [
                                    "type" => "PERCENTAGE","value" => 0
                                ],
                                "bonus" => [
                                    "type" => "PERCENTAGE","value" => 6.6000004
                                ],
                                "effective" => [
                                    "type" => "PERCENTAGE","value" => 0
                                ],
                                "rating" => [
                                    "type" => "DECIMAL","value" => 66
                                ],
                                "type" => "RATED"
                            ],
                            "enum" => "MOVEMENTSPEED",
                            "slug" => "movement-speed",
                            "value" => [
                                "type" => "DECIMAL",
                                "value" => 66
                            ]
                        ]
                    ],
                    "secondary" => [
                        ["enum" => "DAMAGE","slug" => "damage","value" => ["max" => ["type" => "WHOLE","value" => 35.8925],"min" => ["type" => "WHOLE","value" => 21.535501],"type" => "RANGE"]],["enum" => "ATTACKPOWER","slug" => "attack-power","value" => ["type" => "WHOLE","value" => 0]],["enum" => "ATTACKSPEED","slug" => "attack-speed","value" => ["type" => "DECIMAL","value" => 1.645]]]
                ],
                "groups" => [
                    [
                        "name" => "General",
                        "stats" => [
                            ["enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]],
                            ["enum" => "INSANITY","slug" => "insanity","value" => ["type" => "WHOLE","value" => 150]],
                            [
                                "enum" => "MANA","slug" => "mana","value" => ["type" => "WHOLE","value" => 100000]
                            ],
                            ["enum" => "ITEMLEVEL","slug" => "item-level","value" => ["type" => "WHOLE","value" => 188]],
                            ["details" => [
                                "base" => ["type" => "PERCENTAGE","value" => 0],
                                "bonus" => ["type" => "PERCENTAGE","value" => 6.6000004],
                                "effective" => ["type" => "PERCENTAGE","value" => 0],
                                "rating" => ["type" => "DECIMAL","value" => 66],
                                "type" => "RATED"
                            ],
                                "enum" => "MOVEMENTSPEED",
                                "slug" => "movement-speed",
                                "value" => ["type" => "DECIMAL","value" => 66]
                            ]
                        ]
                    ],
                    [
                        "name" => "Attributes","stats" => [["details" => ["base" => ["type" => "WHOLE","value" => 258],"bonus" => ["type" => "WHOLE","value" => 0],"effective" => ["type" => "WHOLE","value" => 258],"rating" => ["type" => "WHOLE","value" => 258],"type" => "ENHANCED"],"enum" => "STRENGTH","slug" => "strength","value" => ["type" => "WHOLE","value" => 258]],["details" => ["base" => ["type" => "WHOLE","value" => 374],"bonus" => ["type" => "WHOLE","value" => 0],"effective" => ["type" => "WHOLE","value" => 374],"rating" => ["type" => "WHOLE","value" => 374],"type" => "ENHANCED"],"enum" => "AGILITY","slug" => "agility","value" => ["type" => "WHOLE","value" => 374]],["details" => ["base" => ["type" => "WHOLE","value" => 452],"bonus" => ["type" => "WHOLE","value" => 858],"effective" => ["type" => "WHOLE","value" => 1310],"rating" => ["type" => "WHOLE","value" => 1310],"type" => "ENHANCED"],"enum" => "INTELLECT","slug" => "intellect","value" => ["type" => "WHOLE","value" => 1310]],["details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]]]],
                    [
                        "name" => "Enhancements","stats" => [["details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],["details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],["details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],["enum" => "BONUSARMOR","slug" => "bonus-armor","value" => ["type" => "WHOLE","value" => 0]],["details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 0],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 0],"type" => "RATED"],"enum" => "LEECH","slug" => "leech","value" => ["type" => "DECIMAL"]],["enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "WHOLE","value" => 102]],["details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 0],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 0],"type" => "RATED"],"enum" => "AVOIDANCE","slug" => "avoidance","value" => ["type" => "DECIMAL","value" => 0]]]],
                    [
                        "name" => "Attack","stats" => [["enum" => "DAMAGE","slug" => "damage","value" => ["max" => ["type" => "WHOLE","value" => 35.8925],"min" => ["type" => "WHOLE","value" => 21.535501],"type" => "RANGE"]],["enum" => "ATTACKPOWER","slug" => "attack-power","value" => ["type" => "WHOLE","value" => 0]],["enum" => "ATTACKSPEED","slug" => "attack-speed","value" => ["type" => "DECIMAL","value" => 1.645]],["enum" => "ATTACKDPS","slug" => "attack-dps","value" => ["type" => "DECIMAL","value" => 19.401352]]]],
                    [
                        "name" => "Spell","stats" => [["enum" => "SPELLPOWER","slug" => "spell-power","value" => ["type" => "WHOLE","value" => 1310]],["enum" => "MANAREGEN","slug" => "mana-regen","value" => ["type" => "DECIMAL","value" => 1600]]]],
                    [
                        "name" => "Defense","stats" => [["details" => ["base" => ["type" => "WHOLE","value" => 0],"bonus" => ["type" => "WHOLE","value" => 302],"effective" => ["type" => "WHOLE","value" => 302],"rating" => ["type" => "WHOLE","value" => 302],"type" => "ENHANCED"],"enum" => "ARMOR","slug" => "armor","value" => ["type" => "WHOLE","value" => 302]],["details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 0],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 0],"type" => "RATED"],"enum" => "DODGE","slug" => "dodge","value" => ["type" => "PERCENTAGE","value" => 3]],["details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 0],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 0],"type" => "RATED"],"enum" => "PARRY","slug" => "parry","value" => ["type" => "PERCENTAGE","value" => 0]],["details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 0],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 0],"type" => "RATED"],"enum" => "BLOCK","slug" => "block","value" => ["type" => "PERCENTAGE","value" => 0]]]]
                ],
                "overview" => [
                    [
                        "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                    ],
                    self::statsForClass($class),
                    [
                        "details" => ["base" => ["type" => "WHOLE","value" => 452],"bonus" => ["type" => "WHOLE","value" => 858],"effective" => ["type" => "WHOLE","value" => 1310],"rating" => ["type" => "WHOLE","value" => 1310],"type" => "ENHANCED"],"enum" => "INTELLECT","slug" => "intellect","value" => ["type" => "WHOLE","value" => 1310]],
                    [
                        "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                    [
                        "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                    [
                        "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                ]
            ];
        }

        public static function characterSpec($class, $activeTalentGroup) {
            $spec = Talents::where('classes', $class)->where('spec', $activeTalentGroup)->first();
            return [
                'enum' => 'SHADOW',
                'id' => $spec->id,
                'name' => $spec->name,
                'role' => [
                    'enum' => 'DAMAGE',
                    'id' => $spec->id,
                    'name' => 'Боец',
                    'slug' => 'damage'
                ],
                'slug' => 'shadow'
            ];
        }

        public static function specCharacters($class, $activeTalentGroup, $guid) {
            $spec = Talents::where('classes', $class)->get();
            $collect = [];
            foreach ($spec as $value) {
                $collect[] = [
                    "active" => self::activeTalent($activeTalentGroup, $value->spec),
                    "description" => $value->description,
                    "glyphs" => [],
                    "icon" => ["url" => asset('storage/'. Utils::ImagesLogo($value->icon))],
                    "id" => "discipline",
                    "name" => $value->name,
                    "pvpTalents" => [
                        "flattened" => self::pvpTalent($guid, $value->spec),
                        "grouped" => self::pvpTalentGrouped($guid, $value->spec)
                    ],
                    "talents" => [
                        "flattened" => [
                            self::talentInfo($guid, $value->spec)
                        ],
                        "grouped" => self::talentGrouped($guid, $value->spec)
                    ],
                    "url" => ""
                ];
            }
            return $collect;
        }

        public static function renderRaw($race, $gender) {
            if(!Images::Exists(public_path('uploads/shadow/profile-raw/'. strtolower(__('characters.key_race_'.$race)) . "-" . strtolower(__('characters.gender_'.$gender)) . ".png") ) ) {
                Images::Download(
                    'https://render-eu.worldofwarcraft.com/shadow/profile-raw/' .
                    strtolower(__('characters.key_race_'.$race)) . '-' .
                    strtolower(__('characters.gender_'.$gender)) . '.png',
                    public_path('uploads/shadow/profile-raw/'. strtolower(__('characters.key_race_'.$race)) . "-" . strtolower(__('characters.gender_'.$gender)) . ".png")
                );
            }
            return asset('uploads/shadow/profile-raw/'.
                strtolower(__('characters.key_race_'.$race)) . "-" .
                strtolower(__('characters.gender_'.$gender)) . ".png");
        }

        public static function renderBackground($class, $race, $gender) {
            if(!Images::Exists(public_path('uploads/shadow/profile-background/'. strtolower(__('characters.class_key_'.$class)) . "-" . strtolower(__('characters.key_race_'.$race)) . "-" . strtolower(__('characters.gender_'.$gender)) . ".jpg") ) ) {
                Images::Download(
                    'https://render-eu.worldofwarcraft.com/shadow/profile-background/' .
                    strtolower(__('characters.class_key_'.$class)) . '-' .
                    strtolower(__('characters.key_race_'.$race)) . '-' .
                    strtolower(__('characters.gender_'.$gender)) . '.jpg',
                    public_path('uploads/shadow/profile-background/'. strtolower(__('characters.class_key_'.$class)) . "-" . strtolower(__('characters.key_race_'.$race)) . "-" . strtolower(__('characters.gender_'.$gender)) . ".jpg")
                );
            }
            return asset('uploads/shadow/profile-background/'.strtolower(__('characters.class_key_'.$class)) . "-" .
                strtolower(__('characters.key_race_'.$race)) . "-" .
                strtolower(__('characters.gender_'.$gender)) . ".jpg");
        }

        public static function pvp($arena2, $arena3, $battlegrounds) {
            return [
                "2v2" => self::rating2v2($arena2),
                "3v3" => self::rating3v3($arena3),
                "battlegrounds" => self::ratingBg($battlegrounds)
            ];
        }

        private static function rating2v2($arena2) {
            $data = [];
            if ($arena2) {
                $data = [
                    "lossCount" => $arena2->games - $arena2->wins,
                    "rating" => $arena2->rating,
                    "tier" => [
                        "id" => 1,
                        "name" => self::imageRating($arena2->rating)['name'],
                        "icon" => [
                            "url" => self::imageRating($arena2->rating)['images']
                        ]
                    ],
                    "winCount" => $arena2->wins,
                    "total" => $arena2->games,
                    "winLoss" => self::percentageOf($arena2->games, $arena2->wins)
                ];
            } else {
                $data = [
                    "lossCount" => 0,
                    "rating" => 0,
                    "tier" => [
                        "id" => 1,
                        "name" => self::imageRating(0)['name'],
                        "icon" => [
                            "url" => self::imageRating(0)['images']
                        ]
                    ],
                    "winCount" => 0,
                    "total" => 0,
                    "winLoss" => self::percentageOf(0, 0)
                ];
            }
            return $data;
        }

        private static function rating3v3($arena3) {
            $data = [];
            if ($arena3) {
                $data = [
                    "lossCount" => $arena3->games - $arena3->wins,
                    "rating" => $arena3->rating,
                    "tier" => [
                        "id" => 1,
                        "name" => self::imageRating($arena3->rating)['name'],
                        "icon" => [
                            "url" => self::imageRating($arena3->rating)['images']
                        ]
                    ],
                    "winCount" => $arena3->wins,
                    "total" => $arena3->games,
                    "winLoss" => self::percentageOf($arena3->games, $arena3->wins)
                ];
            } else {
                $data = [
                    "lossCount" => 0,
                    "rating" => 0,
                    "tier" => [
                        "id" => 1,
                        "name" => self::imageRating(0)['name'],
                        "icon" => [
                            "url" => self::imageRating(0)['images']
                        ]
                    ],
                    "winCount" => 0,
                    "total" => 0,
                    "winLoss" => self::percentageOf(0, 0)
                ];
            }
            return $data;
        }

        private static function ratingBg($battlegrounds) {
            $data = [];
            if ($battlegrounds) {
                $data = [
                    "lossCount" => $battlegrounds->games - $battlegrounds->wins,
                    "rating" => $battlegrounds->rating,
                    "tier" => [
                        "id" => 1,
                        "name" => self::imageRating($battlegrounds->rating)['name'],
                        "icon" => [
                            "url" => self::imageRating($battlegrounds->rating)['images']
                        ]
                    ],
                    "winCount" => $battlegrounds->wins,
                    "total" => $battlegrounds->games,
                    "winLoss" => self::percentageOf($battlegrounds->games, $battlegrounds->wins)
                ];
            } else {
                $data = [
                    "lossCount" => 0,
                    "rating" => 0,
                    "tier" => [
                        "id" => 1,
                        "name" => self::imageRating(0)['name'],
                        "icon" => [
                            "url" => self::imageRating(0)['images']
                        ]
                    ],
                    "winCount" => 0,
                    "total" => 0,
                    "winLoss" => self::percentageOf(0, 0)
                ];
            }
            return $data;
        }

        public static function covenant() {
            return [
                "covenant" => [
                    "description" => "Некролорды вознаграждают сильных и избавляются от слабых. Амбициозные и свирепые души становятся частью бессмертной армии, стоящей на страже Темных Земель.",
                    "enum" => "NECROLORD",
                    "id" => 4,
                    "name" => "Некролорды",
                    "renown" => [
                        "rank" => 38
                    ],
                    "slug" => "necrolord"
                ]
            ];
        }

        public static function percentageOf( $max, $min){
            $percent = $max / 100;
            if($percent == 0) {
                return 0;
            }
            $progressPercent = $min / $percent;
            if($progressPercent > 100) {
                $progressPercent = 100;
            }
            return $progressPercent / 100;
        }

        public static function imageRating($rating) {
            if ($rating > 1370  && $rating <= 1570) {
                return [
                    'tier' => '9',
                    'name' => 'Боец',
                    'images' => asset('cms/template_resource/FQHOIXM3MSHQ1528483047541.png')
                ];
            }
            elseif ($rating > 1570  && $rating <= 1770) {
                return [
                    'tier' => '11',
                    'name' => 'Претендент',
                    'images' => asset('cms/template_resource/Q4TDZMWJS1DC1528483047584.png')
                ];
            }
            elseif ($rating > 1770  && $rating <= 2070) {
                return [
                    'tier' => '12',
                    'name' => 'Фаворит',
                    'images' => asset('cms/template_resource/RI4P9I2JXXXL1528483047769.png')
                ];
            }
            elseif ($rating > 2070  && $rating <= 2370) {
                return [
                    'tier' => '13',
                    'name' => 'Дуэлянт',
                    'images' => asset('cms/template_resource/9WPOSOBTK7GY1528483047820.png')
                ];
            }
            elseif ($rating > 2370) {
                return [
                    'tier' => '14',
                    'name' => 'Ветеран',
                    'images' => asset('cms/template_resource/O3AI2CT4Q06V1528483048012.png')
                ];
            }
            return [
                'tier' => '8',
                'name' => 'Без ранга',
                'images' => asset('cms/template_resource/RJ6XE5WS8D6G1528483047503.png')
            ];
        }

        public static function classes($id) {
            return Classes::where('guid', $id)->select(['name', 'slug'])->firstOrFail();
        }

        public static function Images($patch) {
            return str_replace('\\', '\\\\', $patch);
        }

        public static function ImagesLogo($patch) {
            return str_replace('\\', '/', $patch);
        }

        public static function faction($race) {
            $horde_races    = [10, 35, 6, 31, 2, 9, 27, 5, 8, 28, 36, 26];
            $alliance_races = [1, 32, 4, 3, 22, 29, 7, 37, 11, 34, 30, 25];
            $neutral_races = [24];
            if(in_array($race, $horde_races)) {
                return [
                    'enum' => 'HORDE',
                    'id' => 1,
                    'name' => 'Орда',
                    'slug' => 'horde',
                    'images' => '/static/components/Icon/svg/horde.0a721bba8f062cd956f3e0c723d2b34b.svg#horde'
                ];
            }
            elseif(in_array($race, $neutral_races)) {
                return '';
            }
            elseif(in_array($race, $alliance_races)) {
                return [
                    'enum' => 'ALLIANCE',
                    'id' => 0,
                    'name' => 'Альянс',
                    'slug' => 'alliance',
                    'images' => '/static/components/Icon/svg/alliance.f42675c36dac66ceab3ac9a774c188bd.svg#alliance'
                ];
            } else {
                return false;
            }
        }

        public static function raceCharacters($race) {
            $horde_races    = [10, 35, 6, 31, 2, 9, 27, 5, 8, 28, 36, 26];
            $alliance_races = [1, 32, 4, 3, 22, 29, 7, 37, 11, 34, 30, 25];
            $neutral_races = [24];
            if(in_array($race, $horde_races)) {
                return 'Logo--horde';
            }
            elseif(in_array($race, $neutral_races)) {
                return '';
            }
            elseif(in_array($race, $alliance_races)) {
                return 'Logo--alliance';
            } else {
                return false;
            }
        }

        public static function imageClass($race, $gender) {
            $name = __('forum.icon_race_'. $race);
            $gend = __('forum.icon_gender_'.$gender);
            return asset('/static/components/GameIcon/'. $name . '_' . $gend . '.jpg');
        }

        public static function imageRace($race) {
            $horde_races    = [10, 35, 6, 31, 2, 9, 27, 5, 8, 28, 36, 26];
            $alliance_races = [1, 32, 4, 3, 22, 29, 7, 37, 11, 34, 30, 25];
            $neutral_races = [24];
            if(in_array($race, $horde_races)) {
                return asset('/static/components/Logo/Logo-hordeEmblem.e6d11863f6c65b2a875091c1ac01cb3f.png');
            }
            elseif(in_array($race, $neutral_races)) {
                return asset('/static/components/Logo/Logo-hordeEmblem.e6d11863f6c65b2a875091c1ac01cb3f.png');
            }
            elseif(in_array($race, $alliance_races)) {
                return asset('/static/components/Logo/Logo-allianceEmblem.cd827b18a7766edbf05f09d66bc10e22.png');
            } else {
                return false;
            }
        }

        private static function pvpTalent($guid, $spec) {
            $pvp = DB::connection('characters')->table('character_pvp_talent')->where('guid', $guid)->where('talentGroup', $spec)->orderBy('talent', 'asc')->get();
            $flattened = [];
            foreach ($pvp as $value) {
                $info = Talent::where('talent', $value->talent0)->first();

                if ($info) {
                    $flattened[] = [
                        "cast" => $info->type,
                        "cooldown" => "Восстановление: {$info->time}",
                        "description" => $info->description,
                        "icon" => [
                            "url" => asset('storage/'. Utils::ImagesLogo($info->icon))
                        ],
                        "level" => null,
                        "name" => $info->name,
                        "slot" => $info->index,
                        "slug" => $info->slug
                    ];
                } else {
                    $flattened[] = [];
                }

            }
            return $flattened;
        }

        private static function pvpTalentGrouped($guid, $spec) {
            $talentInfo = DB::connection('characters')->table('character_pvp_talent')->where('guid', $guid)->where('spec', $spec)->get();
            $flattened = [];
            foreach ($talentInfo as $item) {
                $info = Talent::where('talent', $item->talent)
                    ->where('spec', $spec)
                    ->first();
                if ($info) {
                    $flattened[] = [
                        "cast" => $info->type,
                        "cooldown" => "Восстановление: {$info->time}",
                        "description" => $info->description,
                        "icon" => [
                            "url" => asset('storage/'. Utils::ImagesLogo($info->icon))
                        ],
                        "level" => null,
                        "name" => $info->name,
                        "slot" => $info->index,
                        "slug" => $info->slug
                    ];
                } else {
                    $flattened[] = [];
                }
            }
            $chunk =  collect($flattened)->sortBy('level')->values()->toArray();
            return array_chunk($chunk, 4);
        }

        private static function talentGrouped($guid, $spec) {
            $talentInfo = CharactersTalent::where('guid', $guid)->get();
            $talents = [];
            foreach ($talentInfo as $item) {
                $collection = Talent::where('talent', $item->talent)
                    ->where('spec', $spec)
                    ->first();
                if($collection) {
                    $talents[] = [
                        "cast" => $collection->type,
                        "cooldown" => "Восстановление: {$collection->time}",
                        "cost" => "2 000 ед. маны",
                        "description" => $collection->description,
                        "icon" => ["url" => asset('storage/'. Utils::ImagesLogo($collection->icon))],
                        "index" => 2,
                        "level" => $collection->level,
                        "name" => $collection->name,
                        "range" => "Дальность действия: 40 м",
                        "slug" => "strela-smerti"
                    ];
                }
            }

            $chunk =  collect($talents)->sortBy('level')->values()->toArray();
            return array_chunk($chunk, 4);
        }

        private static function talentInfo($guid, $spec) {
            $talentInfo = CharactersTalent::where('guid', $guid)->get();
            $talent = [];
            foreach ($talentInfo as $item) {
                $collection = Talent::where('talent', $item->talent)
                    ->where('spec', $spec)
                    ->first();
                if($collection) {
                    $talent[] = [
                        "cast" => $collection->type,
                        "cooldown" => "Восстановление: {$collection->time}",
                        "cost" => "2 000 ед. маны",
                        "description" => $collection->description,
                        "icon" => ["url" => asset('storage/'. Utils::ImagesLogo($collection->icon))],
                        "index" => 2,
                        "level" => $collection->level,
                        "name" => $collection->name,
                        "range" => "Дальность действия: 40 м",
                        "slug" => "strela-smerti"
                    ];
                } else {
                    $talent[] = ["level" => 15,"icon" => ["url" => "inv_misc_questionmark"],"name" => "Ничего не выбрано"];
                }
            }

            return collect($talent)->sortBy('level')->values()->toArray();
        }

        private static function activeTalent($activeTalentGroup, $spec) {
            if ($spec == $activeTalentGroup) {
                return true;
            }
            return false;
        }

        public static function teleport($name) {
            return Characters::where('name', $name)->update([
                'position_x' => '-14406.599609',
                'position_y' => '419.352997',
                'position_z' => '22.390306',
                'orientation' => '0.000000',
                'zone' => '33',
                'map' => '0',
            ]);
        }

        public static function GetPercent($min, $max)
        {
            $percent = $max / 100;
            if($percent == 0) {
                return 0;
            }
            $progressPercent = $min / $percent;
            if($progressPercent > 100) {
                $progressPercent = 100;
            }
            return $progressPercent;
        }
    }
