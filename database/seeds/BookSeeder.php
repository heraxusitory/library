<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'id' => 1,
            'name' => 'Преступление и наказание',
            'desc' => '"Преступление и наказание" (1866) - одно из самых значительных произведений в истории мировой литературы.
             Это и глубокий философский роман, и тонкая психологическая драма, и захватывающий детектив, и величественная картина мрачного города,
              в недрах которого герои грешат и ищут прощения, жертвуют собой и отрекаются от себя ради ближних и находят успокоение в смирении, покаянии, вере.
               Главный герой романа Родион Раскольников решается на убийство, чтобы доказать себе и миру, что он не "тварь дрожащая", а "право имеет".
                Главным предметом исследования писателя становится процесс превращения добропорядочного, умного и доброго юноши в убийцу, а также то,
                 как совершивший преступление Раскольников может искупить свою вину. "Преступление и наказание" неоднократно экранизировали,
                  музыку к балету написал Чайковский, а недавно на одной из московских площадок по роману была поставлена рок-опера.
'
        ]);

        DB::table('books')->insert([
            'id' => 2,
            'name' => 'Игрок',
            'desc' =>'Роман "Игрок" занимает в творчестве Ф. М. Достоевского особое место,
             - в нем исключительно сильны автобиографические мотивы: многолетнее увлечение
              писателя игрой на рулетке и сложные, мучительные взаимоотношения с А. П. Сусловой.
               Замысел "Игрока" возник еще в 1863 г. Осенью 1865 г., испытывая финансовые трудности,
                Достоевский всего за 26 дней надиктовал текст романа стенографистке А. Г. Сниткиной
                 (ставшей впоследствии его женой). По ее воспоминаниям, когда в процессе работы над романом
                  обсуждались судьбы героев, то "Федор Михайлович был вполне на стороне "игрока" и говорил,
                   что многое из его чувств и впечатлений испытал сам на себе. Уверял, что можно обладать
                    сильным характером, доказать это своею жизнью и тем не менее не иметь сил побороть в себе страсть
                     к игре на рулетке".
',
        ]);

        DB::table('books')->insert([
            'id' => 3,
            'name' => 'Братья Карамазовы',
            'desc' =>'Жил-был отец. И было у него три сына. Даже, по слухам, четыре. Один верил в Бога, другой
             - в черта, третий верил в Бога, но жил черт знает как, а четвертый был уверен, что если Бога нет,
              то все позволено. Четыре кредо, четыре жизненных стратегии. С тех пор прошло почти полтора
               столетия - до неузнаваемости изменился мир, но человек остался прежним. Он, как и прежде,
                ищет ответ не только на вопрос "быть или не быть?", но и на вопрос "с кем быть?". И в этом смысле
                 нет в ХХI веке для юноши, обдумывающего житье, чтения более душеспасительного, чем "Братья Карамазовы"
                  Федора Михайловича Достоевского (1821-1881). Очень важно прочесть эту книгу вовремя, до тридцати,
                   и определиться, с кем из братьев тебе по пути. И, возможно, кто-нибудь из новых читателей, перевернув
                    последнюю страницу великого романа, воскликнет, как знаменитый русский живописец Иван Крамской:
                     "Ну, если и после этого мир не перевернется на оси туда, куда желает художник, то умирай человеческое
                      сердце!"',
        ]);
        DB::table('books')->insert([
            'id' => 4,
            'name' => 'Куджо',
            'desc' => 'Действие происходит в городке Касл-Рок. В основном это история двух семей, но в повествование включены также кусочки жизни многих других обитателей Касл-Рока. Роман не разделен на главы, но разрывы между абзацами показывают, что повествование переключается на другую точку зрения.
Семья Трентенов, представители среднего класса, недавно переехали в Касл-Рок из Нью-Йорка. У них есть четырехлетний сын Тэд. Глава семьи, Вик, недавно поймал свою жену Донну на измене. Напряжение в семье и так возрасло, а тут еще рекламное агентство Вика обанкротилось. Поэтому Вик вынужден уехать из города, и Тэд и Донна остаются одни.
Также в городе проживает семья Кэмберов, синие воротнички, они живут в городе уже давно. Джо Кэмбер — механик, и он частенько поколачивает свою жену Черети и десятилетнего сына Бретта. Черети выигрывает в лотерею 5000 долларов и просит разрешения поехать с Бретом к сестре в Коннектикут. Джо соглашается, а сам планирует в это время совершить поездку в Бостон.
Куджо — это огромный сенбернар Кэмберов. Он бегает по полю за кроликом и загоняет его в маленькую пещеру. Куджо сует туда голову, и одна из живущих в пещере летучих мышей кусает его за нос и заражает вирусом. Когда Черети и Бретт уезжают из города, Куджо убивает их соседа-алкоголика Гари Первира. Когда Джо приходит к Гари, чтобы рассказать ему про поездку, Куджо убивает и его тоже
Донна берет Тэда и отвозит свою машину к Кэмберам на починку. Машина ломается во дворе Кэмберов, и Донна пытается найти Джо. Появляется Куджо и нападает на женщину. Донна прячется в машине, и они с Тэдом оказываются взаперти, да еще и под палящим солнцем. Внутри становится невыносимо жарко. Донна предпринимает попытку побега. Куджо кусает ее в живот и за ногу, но Донне удается отступить к машине и вновь спрятаться. Донна подумывает о том, чтобы добежать до дома, но она не уверена, что дверь открыта, и боится, что на этот раз Куджо закусает ее до смерти.
Вик возвращается в Касл-Рок и узнает, что Стив Кемп, человек, с которым у Донны была интрижка, подозревается в похищении Донны и Тэда. Полицейский Джордж Баннерман идет обследовать дом Кэмберов, но его убивает Куджо. Донна наблюдает за этим. Она смотрит на Тэда и понимает, что он может умереть от обезвоживания. Донна нападает на Куджо и убивает его. Приезжает Вик, а потом и представители правоохранительных органов. Тэд уже умер от обезвоживания и теплового удара. Донну отвозят в больницу. Голову Куджо отрезают, чтобы провести биопсию и проверить на бешенство, а потом его останки сжигают.
Спустя несколько месяцев семьи Трентонов и Кэмберов пытаются наладить свою жизнь. Донна заканчивает лечение от бешенства. Они с Виком мирятся. Черети дарит Бретту нового щенка. В постскриптуме читателям напоминают, что Куджо был хорошей собакой, который хотел делать хозяев счастливыми, но из-за бешенства он впал в ярость и стал убивать.'
        ]);
        DB::table('books')->insert([
         'id' => 5,
         'name' => 'Ведьмак',
         'desc' => 'Одна из лучших фэнтези-саг за всю историю существования жанра. Оригинальное, масштабное эпическое произведение, одновременно и свободное от влияния извне, и связанное с классической мифологической, легендарной и сказовой традицией. Шедевр не только писательского мастерства Анджея Сапковского, но и переводческого искусства Евгения Павловича Вайсброта. "Сага о Геральте" - в одном томе. Бесценный подарок и для поклонника прекрасной фантастики, и для ценителя просто хорошей литературы. Перед читателем буквально оживает необычный, прекрасный и жестокий мир литературной легенда, в котором обитают эльфы и гномы, оборотни, вампиры и "низушки"-хоббиты, драконы и монстры, - но прежде всего люди. Очень близкие нам, понятные и человечные люди - такие как мастер меча ведьмак Геральт, его друг, беспутный менестрель Лютик, его возлюбленная, прекрасная чародейка Йеннифэр, и приемная дочь - безрассудно отважная юная Цири...'
        ]);

        DB::table('books')->insert([
            'id' => 6,
            'name' => 'Война и мир ',
            'desc' => 'Хорошо известный классический роман-эпопея Льва Толстого рассказывает о сложном, бурном периоде в истории России и всей Европы — эпохе завоевательных походов императора Наполеона в Восточную Европу и Россию, с 1805 по 1812 год. Автор подробно рассказывает о Войне — о ходе боевых действий от Аустерлица до Бородино и Березины; и о Мире — показана жизнь в России в это же время, причем пером писателя охвачены все слои общества — дворянские семьи, крестьяне, горожане, солдаты и даже императоры.
В этом большом, многоплановом романе действуют десятки и сотни персонажей — и в их числе реальные исторические лица, при помощи которых Толстой старается изобразить жизнь в ту эпоху во всем ее многообразии. Часто автор отступает от основных событий романа и излагает свое мнение и взгляды по множеству вопросов — он говорит об исторической науке, о социологии и психологии, морали и нравственности, свободе и необходимости.'
        ]);}

}
