<?php

namespace View;

class AboutUsView extends BaseView {

    public $content;

    public function show() {
        $this->start();
        ?>
        <div class='content_inner'>
        <div class='container'>
        <h1><?=$this->content['header']?></h1>
        <div class='page'>
        <div class='row'>
            <div class='span12'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="/"><?=$this->content['root']?></a>
                        <span class='divider'>/</span>
                    </li>
                    <li class='active'>
                    <?=$this->content['header']?>
                    </li>
                </ul>
            </div>
        </div>
        <div class='row'>
        <div class='page_sidebar span3'>
            <div id='sidebar'>
                <ul class='nav nav-tabs nav-stacked' id='sidebar_nav'>
                    <li class='active'>
                        <a class='level-2' href='#otzyvy-nashikh-kliientov'>
                            Отзывы наших клиентов
                        </a>
                    </li>
                    <li>
                        <a class='level-2' href='#r-and-i-group'>
                            R&amp;I Group
                        </a>
                    </li>
                    <li>
                        <a class='level-2' href='#ooo-altierplast'>
                            ООО &quot;Альтерпласт&quot;
                        </a>
                    </li>
                    <li>
                        <a class='level-2' href='#ooo-altiernativnyi-markietingh'>
                            ООО &quot;Альтернативный маркетинг&quot;
                        </a>
                    </li>
                    <li>
                        <a class='level-2' href='#ooo-arsienii-studiia'>
                            ООО &quot;Арсений Студия&quot;
                        </a>
                    </li>
                    <li>
                        <a class='level-2' href='#ooo-kielbi-priedstavitielstvo-kelsenbisca-po-sng'>
                            ООО &quot;КелБи&quot; (представительство KelsenBISCA по СНГ)
                        </a>
                    </li>
                    <li>
                        <a class='level-2' href='#ooo-ligha-spietsodiezhdy'>
                            ООО &quot;Лига Спецодежды&quot;
                        </a>
                    </li>
                    <li>
                        <a class='level-2' href='#ooo-mdm-domashnii-mastier'>
                            ООО &quot;МДМ&quot; (Домашний мастер)
                        </a>
                    </li>
                    <li>
                        <a class='level-2' href='#ooo-td-papillons'>
                            ООО &quot;ТД &quot;Папиллонс&quot;
                        </a>
                    </li>
                    <li>
                        <a class='level-2' href='#ramu-rossiiskaia-assotsiatsiia-markietinghovykh-uslugh'>
                            РАМУ (Российская Ассоциация Маркетинговых Услуг)
                        </a>
                    </li>
                    <li>
                        <a class='level-2' href='#ooo-pk-toris-grupp-toris'>
                            ООО &quot;ПК &quot;ТОРИС-ГРУПП&quot; (Toris)
                        </a>
                    </li>
                    <li>
                        <a class='level-2' href='#ooo-formika'>
                            ООО &quot;Формика&quot;
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class='page_content span9'>
        <div class='content'>
        <div class='addthis_toolbox addthis_default_style'>
            <a class='addthis_button_print'></a>
            <a class='addthis_button_email'></a>
            <a class='addthis_button_compact'>
            </a>
        </div>
        <script>
            var addthis_config = {
                "ui_language":"ru"
            };
        </script>
        <script src="/static/js/addthis_widget.js#pubid=ra-514d7fb05b596d5b" type='text/javascript'></script>
        <section id='otzyvy-nashikh-kliientov'>
            <h3>Отзывы наших клиентов</h3>
        </section>
        <section id='r-and-i-group'>
            <h3>R&amp;I Group</h3>
            <p>R&amp;I Group - российское коммуникационное агентство основано в 1997 году, предоставляющее стратегические услуги по направлениям BTL, Реклама, PR, Дизайн и Ивент-маркетинг.</p>
            <p>R&amp;I Group – одно из самых титулованных рекламных агентств в РФ: имеет 5 гран-при и десятки высших наград международных фестивалей, входит в TOП крупнейших агентств по биллингам и креативу.</p>
            <p>R&amp;I Group искренне благодарит компанию <a href="/">Willance</a> за профессиональную поддержку и консультации при выборе и проведении переговоров с факторинговыми компаниями.</p>
            <p>За время сотрудничества с Willance мы убедились в высоком уровне профессионализма ее сотрудников и в хорошем знании практики работы факторинговых компаний. Консультанты Willance работали слаженно и четко, используя прекрасное знание «внутренней кухни» факторинговых компаний. Рекомендации, полученные при определении потребности (размер дебиторки, сроки отсрочки платежа, предполагаемый лимит и т.д.), оказали неоценимую помощь и привели к результатам, добиться которых без квалифицированной поддержки независимого брокера было бы невозможно.</p>
            <p>В дальнейшем, при возникновении проблемных ситуаций, мы обязательно будем обращаться именно к нашему партнёру Willance. Мы можем с полной уверенностью рекомендовать эту компанию нашим коллегам по бизнесу и друзьям.</p>
            <p>Ольга Суменкова, финансовый директор, R&amp;I Group</p>
        </section>
        <section id='ooo-altierplast'>
            <h3>ООО "Альтерпласт"</h3>
            <p>Компания "Альтерпласт" основана в 2001 году, является заметным игроком на рынке ваодоснабжения, отопления и канализации.</p>
            <p>Сотрудничество с компанией <a href="/">Willance</a> и лично с Муратом Ошроевым началось более пяти лет назад. При динамичном росте бизнеса всегда не хватает оборотных средств и привлечь их за счет финансирования под уступку дебиторской задолженности - отличная идея.</p>
            <p>Казалось бы что проще - на рынке полно факторов иди к любому и заключай договор. Но как всегда есть нюансы. Необходимо тщательно проработать не менее
                5-8 факторов, пока придет понимание что именно вам нужно, а это время и деньги. Дешевле обратиться к профессиональному брокеру, который постоянно "варится" в этом бизнесе и сразу может предложить вам оптимальное решение. </p>
            <p>Для нас таким брокером стал Willance. Если вы новичок и не разбираетесь в вопросах факторинга Willance приедет к вам в офис и проведет подробные консультации обучит персонал, примет активное участие в получении вами оптимальных условий у фактора.</p>
            <p>Рекомендуем.</p>
            <p>Павел Богомолов, финансовый директор, Компания "Альтерпласт".</p>
        </section>
        <section id='ooo-altiernativnyi-markietingh'>
            <h3>ООО "Альтернативный маркетинг"</h3>
            <p>Компания « Альтернативный маркетинг» образована в 2008 году как сервисное агентство и  входит в состав   Группы  компаний «Альтер Эго»/ </p>
            <p>С компанией <a href="/">Willance</a> мы познакомились на семинаре, который она проводила совместно с АКАР и РАМУ 4 года назад.  В определенный момент возникла необходимость компании в привлечении финансовых ресурсов в дополнение к кредитным средствам.</p>
            <p>Тогда мы не работали по факторингу, и о существовании данной услуги мы знали совсем не много. Профессиональная консультация и помощь в выборе компании и согласовании условий была нам необходима.</p>
            <p>Благодаря помощи  Willance мы четко обозначили наши пожелания: необходимый лимит, возможные дебиторы, факторинговые компании. </p>
            <p>По нашей просьбе Willance предложил нам несколько факторов с различными условиями предоставления услуг и стоимости. Мы очень признательны Willance за  организацию и проведение переговоров с компаниями и банками. В результате совместной работы мы получили оптимальные условия финансирования, смогли определиться с выбором фактора. </p>
            <p>Сотрудничество с компанией Willance – это своевременные консультации, всегда полная информация и поддержка клиента на всех стадиях. Рекомендую Willance своим партнерам.</p>
            <p>Крячков Сергей Валерьевич, Генеральный директор ООО "Альтернативный маркетинг"</p>
        </section>
        <section id='ooo-arsienii-studiia'>
            <h3>ООО "Арсений Студия"</h3>
            <p>Рекламно-производственная фирма "Арсений Студия" основана в 1996 году. С 2000 года фирма разрабатывает и производит POS материалы и является одним из лидеров российского рынка POSM. Наша продукция высоко оценена на международных и Российских конкурсах POSM. </p>
            <p>В 2012 году, мы приняли решение воспользоваться такой услугой, как факторинг. Почти полгода ушло на переговоры с банками и другими кредитными организациями. Результат оставлял желать лучшего. </p>
            <p>Всё изменилось после обращения в компанию <a href="/">Willance</a>. Компанию отличает оперативность реагирования на все пожелания заказчика, профессионализм сотрудников, наивысшая компетентность в выбранной сфере деятельности, но самое главное - РЕЗУЛЬТАТ. Все обязательства по условиям  и срокам были соблюдены. Коммуникации на самом профессиональном уровне. Наша компания осталась очень довольна сотрудничеством.  Большое  ВАМ спасибо! </p>
            <p>Стахурская Анастасия, финансовый директор ООО "Арсений-Студия"</p>
        </section>
        <section id='ooo-kielbi-priedstavitielstvo-kelsenbisca-po-sng'>
            <h3>ООО "КелБи" (представительство KelsenBISCA по СНГ)</h3>
            <p>Холдинг KelsenBISCA A/S – крупнейший в мире производитель традиционного датского печенья, лидер по производству печенья, крекеров и кондитерских деликатесов в Скандинавии. </p>
            <p>С компанией <a href="/">Willance</a> мы успешно работаем на протяжении 4х лет. Поводом обратиться в Willance стала необходимость компании в привлечении финансовых ресурсов в дополнение к кредитным средствам.  </p>
            <p>В то время мы не работали по факторингу, эта услуга была новой для нас, поэтому нам требовалась профессиональная консультация и помощь в выборе факторинговой компании и согласовании приемлемых для нас условий.</p>
            <p>На первом этапе вместе с Willance мы четко сформулировали собственную задачу: необходимый денежный поток, возможные дебиторы, предполагаемые факторинговые компании.  Также приняли решение начать работу с двумя факторами.</p>
            <p>Далее  Willance предложил нам несколько возможных факторов с различными условиями предоставления услуг и стоимости.  Огромная помощь была оказана нам в организации и проведении самих переговоров с компаниями и банками. Отмечу, что благодаря усилиям наших консультантов мы получили лучшие условия финансирования, смогли оптимально распределить дебиторов по факторам. Кроме этого, Willance провел обучение сотрудников нашей бухгалтерии по работе с факторинговыми документами.</p>
            <p>Через год-полтора  мы решили поменять одного из факторов. И вновь на помощь пришел Willance со своим всегда своевременным и профессиональным советом. Впереди у нас еще новые планы, а значит, и работа вместе с Willance.</p>
            <p>Самое главное, что хочу сказать о компании Willance, что работать с ними удобно и приятно: всегда своевременные и необходимые нам консультации, предоставление полной информации, поддержка клиента на переговорах и всегда приятное общение. Рекомендовала Willance нескольким своим партнерам, которым, на мой взгляд, обязательно требовались подобные услуги.</p>
            <p>Семенова Светлана Анатольевна, заместитель Генерального директора ООО "КелБи"</p>
        </section>
        <section id='ooo-ligha-spietsodiezhdy'>
            <h3>ООО "Лига Спецодежды"</h3>
            <p>ООО «ЛИГА СПЕЦОДЕЖДЫ» основано в 2006  году. Основные направления: разработка, производство и продажа профессиональной одежды, специальной обуви и средств защиты.</p>
            <p>ООО «Лига Спецодежды» выражает искреннюю благодарность компании <a href="/">Willance</a> и лично управляющему партнёру Мурату Ошроеву за квалифицированную помощь и поддержку в решении поставленных задач по факторинговому обслуживанию. </p>
            <p>Willance - надёжный партнёр, который качественно и успешно справился с поставленными задачами в работе с факторинговыми компаниями. </p>
            <p>Мы с уверенностью готовы порекомендовать эту компанию, всем кому нужна помощь в выборе оптимального решения по подбору факторингового партнёра. </p>
            <p>Благодарим вас за эффективное сотрудничество и верим в сохранение сложившихся деловых отношений. Желаем вашей компании больших профессиональных успехов и достижения новых вершин.</p>
            <p>Михаил Коченов, генеральный директор ООО "Лига Спецодежды Центр"</p>
        </section>
        <section id='ooo-mdm-domashnii-mastier'>
            <h3>ООО "МДМ" (Домашний мастер)</h3>
            <p>Сотрудничество с компанией Willance началось в 2011 году. Наши планы были достаточно серьезны, оборотных средств все не хватало. Приняли решение о необходимости кредитования в форме факторинга. </p>
            <p>Для того чтобы быстро и грамотно разобраться в сути вопроса, оценить имеющиеся на этом рынке предложения и подобрать для нас оптимальное, нам понадобились услуги профессионального брокера.  Хорошо разбирающегося в тонкостях факторинга:  формирования ставок, тарифных планов, технической части и т.д. В роли такого брокера и выступил <a href="../index.htm" tppabs="http://www.willance.com/">Willance</a> в лице управляющего партнера Мурата Ошроева. </p>
            <p>Приятно отметить серьезный профессиональный подход к делу. На первых же встречах мы получили исчерпывающую консультацию по факторингу в целом и его существенным моментам в частности. Затем были оптимально определены наши потребности, состав дебиторов, предполагаемый лимит переуступаемой дебиторской задолженности. </p>
            <p>Результатом работы был подбор фактора, наиболее полно отвечающего всем нашим условиям. Компанией Willance была подготовлена встреча с фактором, проведены совместные переговоры. Весь документооборот с фактором – подготовку и согласование договоров, всех сопутствующих форм и т.д. также взяли на себя сотрудники Willance. Все было сделано очень быстро и оперативно. </p>
            <p>В течении начального периода работы с фактором Willance вел сопровождение нашего взаимодействия. Помогал решать неизбежно возникающие в начале работы вопросы.</p>
            <p>Прошло почти 2 года. Мы продолжаем работать с тем же фактором. Его условия продолжают быть для нас лучшими на рынке факторинга. Объем кредитования за это время вырос в разы. Работа налажена до тонкостей, никаких проблем не возникает. За исключением пожалуй постоянного роста кредитных ставок, который к сожалению не зависит ни от нашего фактора, ни от Willance.</p>
            <p>Хочу выразить благодарность сотрудникам Willance и лично Мурату Ошроеву за то, что они отлично делают свою работу. В случае возникновения у наших партнеров потребности в услугах кредитного брокера – однозначно будем рекомендовать им Willance.</p>
            <p>Сергей Серик, генеральный директор ООО «МДМ» (Домашний мастер)</p>
        </section>
        <section id='ooo-td-papillons'>
            <h3>ООО "ТД "Папиллонс"</h3>
            <p>Торговый Дом Папиллонс на протяжении последних двадцати лет является лидером российского рынка материалов для производства наружной рекламы и оборудования для цифровой широкоформатной печати. </p>
            <p>От лица компании Папиллонс и себя лично выражаю искреннюю благодарность компании «Willance», за квалифицированное оказание консалтинговых услуг в области факторингового обслуживания, за оперативные и грамотные действия сотрудников компании, а также за высокое качество выполненной работы.</p>
            <p>Компания <a href="/">Willance</a> - надёжный партнёр, успешно справляющийся с возникающими вопросами относительно факторингового обслуживания. </p>
            <p>Мы с уверенностью готовы порекомендовать эту компанию, всем кому нужна помощь в реализации факторинга в бизнес-процессах организации. </p>
            <p>Благодарим вас за эффективное сотрудничество и верим в сохранение сложившихся деловых отношений. Желаем вашей компании больших профессиональных успехов и новых достижений.</p>
            <p>Марк Дроб, финансовый управляющий, ООО "ТД "Папиллонс"</p>
        </section>
        <section id='ramu-rossiiskaia-assotsiatsiia-markietinghovykh-uslugh'>
            <h3>РАМУ (Российская Ассоциация Маркетинговых Услуг)</h3>
            <p>Российская Ассоциация Маркетинговых Услуг (РАМУ) - крупнейшая в России некоммерческая организация, с 2001 года объединяющая более 100 столичных и региональных агентств, специализирующихся на маркетинговых услугах: Consumer Promotion, Sales Promotion, Event Marketing, Trade Marketing (Merchandising), Direct Marketing/CRM. </p>
            <p>Выражаю искреннюю благодарность Мурату Ошроеву, управляющему партнёру компании <a href="/">Willance</a>, за организацию и проведение семинара по факторингу для членов Российской Ассоциации Маркетинговых Услуг (РАМУ). В рамках организации мероприятия.</p>
            <p>Мурат привлек  к участию представителей ведущих факторинговых структур - ВТБ Факторинг и Национальной Факторинговой Компании.</p>
            <p>С удовольствием рекомендую компанию Willance всем, кому нужна профессиональная помощь в поиске и внедрении факторинговых услуг. </p>
            <p>Желаю компании Willance больших успехов и от имени  РАМУ выражаю надежду в дальнейшем продолжить плодотворное и эффективное сотрудничество!</p>
            <p>Михаил Симонов, Президент РАМУ</p>
        </section>
        <section id='ooo-pk-toris-grupp-toris'>
            <h3>ООО "ПК "ТОРИС-ГРУПП" (Toris)</h3>
            <p>Компания «ТОРИС» существует с 1992 года. И сегодня является одним из признанных лидеров в области производства высококачественных матрасов в России.</p>
            <p><a href="/">Willance</a> помогли решить задачи, которые мы самостоятельно решить не могли. Отмечаем отличное знание рынка, точное соблюдение сроков и всех договоренностей и, особенно, желание найти оптимальное решение. </p>
            <p>Алексей Авдюшкин, финансовый директор ООО "ПК "ТОРИС-ГРУПП"</p>
        </section>
        <section id='ooo-formika'>
            <h3>ООО "Формика"</h3>
            <p>Компания Formika основана в 2000 году. Основные направления деятельности - организация выставочных и деловых мероприятий от этапа разработки концепции до реализации мероприятия.</p>
            <p>Настоящим письмом выражаем благодарность компании Willance, которая благодаря своему профессионализму, помогла решить сложные задачи, стоящие перед нашей компанией.</p>
            <p>Отдельно хотелось бы отметить, что в своей работе <a href="/">Willance</a> учитывает специфику деятельности клиента и оперативно предлагает варианты решения вопросов.</p>
            <p>Андрей Дорошенко, финансовый директор, ООО "Формика"</p>
        </section>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <?
        $this->end();
        return $this->content;
    }
}