<?php
namespace View;

class LkView extends BaseView {

    public function show() {
        $this->start();
        ?>
        <script type="text/javascript">
            function showChoices(dvid){
                if( $('#'+dvid) ){
                    $('#'+dvid).is(":visible") ? $('#'+dvid).hide(1000) : $('#'+dvid).show(1000);
                    $('#'+dvid+'_arrow').hasClass('right') ? $('#'+dvid+'_arrow').removeClass('right').addClass('down') : $('#'+dvid+'_arrow').removeClass('down').addClass('right');
                }
                return false;
            }
        </script>
        <h1>Главная</h1>
        <div class="list check">
            <h2>Укажите необходимое решение</h2>
            <form id="fs" action="/lk/pform" method="POST">
            <div class="item">
                <div class="label">Факторинг с регрессом</div>
                <div class="radio">
                    <input id="rfy" type="radio" name="rf" value="y">
                    <label for="rfy">Да</label>
                    <input id="rfn" type="radio" name="rf" value="n">
                    <label for="rfn">Нет</label>
                </div>
            </div><!-- item -->
            <div class="item">
                <div class="label">Факторинг без регресса</div>
                <div class="radio">
                    <input id="rwfy" type="radio" name="rwf" value="y">
                    <label for="rwfy">Да</label>
                    <input id="rwfn" type="radio" name="rwf" value="n">
                    <label for="rwfn">Нет</label>
                </div>
            </div><!-- item -->
            <div class="item">
                <div class="label">Реверсивный факторинг</div>
                <div class="radio">
                    <input id="rvrfy" type="radio" name="rvrf" value="y">
                    <label for="rvrfy">Да</label>
                    <input id="rvrfn" type="radio" name="rvrf" value="n">
                    <label for="rvrfn">Нет</label>
                </div>
            </div><!-- item -->
            <div class="item">
                <div class="label">Закрытый факторинг</div>
                <div class="radio">
                    <input id="male" type="radio" name="gender" value="male">
                    <label for="male">Да</label>
                    <input id="female" type="radio" name="gender" value="female">
                    <label for="female">Нет</label>
                </div>
            </div><!-- item -->
            <div class="item">
                <div class="label">Тендерный факторинг</div>
                <div class="radio">
                    <input id="male" type="radio" name="gender" value="male">
                    <label for="male">Да</label>
                    <input id="female" type="radio" name="gender" value="female">
                    <label for="female">Нет</label>
                </div>
            </div><!-- item -->
            <div class="item">
                <div class="label">Экспортный факторинг</div>
                <div class="radio">
                    <input id="male" type="radio" name="gender" value="male">
                    <label for="male">Да</label>
                    <input id="female" type="radio" name="gender" value="female">
                    <label for="female">Нет</label>
                </div>
            </div><!-- item -->
            <div class="item">
                <div class="label">Импортный факторинг</div>
                <div class="radio">
                    <input id="male" type="radio" name="gender" value="male">
                    <label for="male">Да</label>
                    <input id="female" type="radio" name="gender" value="female">
                    <label for="female">Нет</label>
                </div>
            </div><!-- item -->
            <div class="item">
                <div class="label">Финансирование заказов</div>
                <div class="radio">
                    <input id="male" type="radio" name="gender" value="male">
                    <label for="male">Да</label>
                    <input id="female" type="radio" name="gender" value="female">
                    <label for="female">Нет</label>
                </div>
            </div><!-- item -->
            <div class="item">
                <div class="label">Портфельное финансирование</div>
                <div class="radio">
                    <input id="male" type="radio" name="gender" value="male">
                    <label for="male">Да</label>
                    <input id="female" type="radio" name="gender" value="female">
                    <label for="female">Нет</label>
                </div>
            </div><!-- item -->
            <div class="item">
                <div class="label">Поручительство без финансирование</div>
                <div class="radio">
                    <input id="male" type="radio" name="gender" value="male">
                    <label for="male">Да</label>
                    <input id="female" type="radio" name="gender" value="female">
                    <label for="female">Нет</label>
                </div>
            </div><!-- item -->
            </form>
        </div>
        <a class="next" href="#" onclick="if($('#fs'))$('#fs').submit();return false;">Далее</a>
        <!-- <div class="list table">
            <div class="item itembig" onclick="showChoices('rf')">
                <div class="factoring">
                    Факторинг с регрессом
                </div>
                <div id="rf_arrow" class="arrow right">
                </div>
            </div>
            <div id="rf" class="item choice" style="height:140px">
                <div class="hidden_choice">
                    <a class="nextBig" href="/lk/pform?page=1&rf=1">Открытый</a>
                    <div class="explanation">
                        Открытый факторинг с регрессом подразумевает вашу готовность подписать уведомление банка
                    </div>
                </div>
                <div class="hidden_choice">
                    <a class="nextBig" href="/lk/pform?page=1&rf=1&cf=1">Закрытый</a>
                    <div class="explanation">
                        Закрытый факторинг с регрессом подразумевает что вы пока не готовы подписать уведомление банка
                    </div>
                </div>
            </div>
            <div class="item itembig" onclick="showChoices('rwf')">
                <div class="factoring">
                    Факторинг без регресса
                </div>
                <div id="rwf_arrow" class="arrow right">
                </div>
            </div>
            <div id="rwf" class="item choice" style="height:120px">
                <div class="hidden_choice">
                    <a class="nextBig" href="/lk/pform?page=1&rwf=1">Покупка дебиторской задолженности</a>
                    <div class="explanation">
                        Факторинг без регресса
                    </div>
                </div>
                <div class="hidden_choice">
                    <a class="nextBig" href="/lk/pform?page=1&rwf=1&ccr=1">Покрытие риска неоплаты</a>
                    <div class="explanation">
                        Покрытие кредитного риска
                    </div>
                </div>
            </div>

            <div class="item itembig">
                <a href="/lk/pform?page=1&fc=1" style="color:#000000">
                    <div class="factoring">
                        Финансирование закупок
                    </div>
                </a>
            </div>

            <div class="item itembig" onclick="showChoices('inf')">
                <div class="factoring">
                    Международный факторинг
                </div>
                <div id="inf_arrow" class="arrow right">
                </div>
            </div>
            <div id="inf" class="item choice" style="height:60px">
                <div class="hidden_choice">
                    <a class="nextBig" href="/lk/pform?page=1&ef=1">Экспортный факторинг</a>
                </div>
                <div class="hidden_choice">
                    <a class="nextBig" href="/lk/pform?page=1&if=1">Импортный факторинг</a>
                </div>
            </div>
        </div>
        -->
        <?
        $this->end();
        return $this->content;
    }

    public function showDocuments(){
        $this->start();
        ?>
        <h1>Загрузка документов</h1>
            <div class="stepline">
                <?
                $numSteps = $this->content['numSteps'];
                for( $i=1; $i<=$numSteps; $i++){
                    $class = '';

                    if( $i <= $this->content['progress'] ){
                        if( $i < $this->content['page'] ){
                            $class = 'active';
                        }
                        if( $i == $this->content['page'] ){
                            $class = 'current';
                        }
                    }

                    if( $i == $numSteps )
                        $class .= ' last';
                    echo '  <div class="stepblock '.$class.'">
                                <div class="step">
                                    <a href="/lk/pform?page='.$i.'">
                                        <div class="numb">'.$i.'</div>
                                    </a>
                                </div>
                                <div class="line"></div>
                            </div>';
                }
                ?>
                <div class="clr"></div>
            </div>
            <div class="stepofstep"><?= $this->content['page'] ?> шаг (<?= $this->content['page'] ?> из 6)</div>
            <form id="fudata" action="/lk/documents" method="POST">
                <input type="hidden" name="fuform" value="<?=$this->content['page']?>"/>
            <?
                $count = 0;
                foreach( $this->content['fields'] as $fdata ){
                    $count++;
                    $id = $count;
                    ?>
                    <div class="doc step-4">
                        <div class="head">
                            <? if( $fdata['desc']['act '] != '' ){
                            ?>
                            <div class="item item-1">
                                <div class="small">Номер счета</div>
                                <div class="big"><?=$fdata['desc']['acn']?></div>
                            </div>
                            <div class="item item-2">
                                <div class="small">Вид счета</div>
                                <div class="big"><?=$fdata['desc']['act']?></div>
                            </div>
                            <div class="item item-3">
                                <div class="small">Период</div>
                                <div class="big"><?=$fdata['desc']['tp']?></div>
                            </div>
                            <div class="item item-4">
                                <div class="small">Детализация</div>
                                <div class="big"><?=$fdata['desc']['d']?></div>
                            </div>
                            <div class="item item-5">
                                <div class="small">Разбивка на файлы</div>
                                <div class="big"><?=$fdata['desc']['qp']?></div>
                            </div>
                            <div class="item item-6">
                                <div class="small">Колличество файлов</div>
                                <div class="big"><?=$fdata['desc']['nof']?></div>
                            </div>
                            <?
                            }
                            else{
                            ?>
                            <div class="item item-1">
                                <div class="small">Номер документа</div>
                                <div class="big"><?=$count?></div>
                            </div>
                            <div class="item item-2">
                                <div class="small">Описание</div>
                                <div class="big"><?=$fdata['desc']['acn']?></div>
                            </div>
                            <div class="item item-3">
                                <div class="small">Колличество файлов</div>
                                <div class="big"><?=$fdata['desc']['nof']?></div>
                            </div>
                            <?}?>
                        </div>
                        <div class="files">
                            <div class="file" style="display:none">
                                <div id="fupath<?=$id?>" class="path"><?= isset($this->content['values'][ $fdata['id'] ]) ? '/upload/' . $this->content['values'][ $fdata['id'] ] : '' ?></div>
                                <div class="load">
                                    <span class="bg">
                                      <span id="fupl<?=$id?>" class="line" style="width: <?= isset($this->content['values'][ $fdata['id'] ]) ? '100%' : '0%' ?>"></span>
                                    </span>
                                    <span id="fupv<?=$id?>" class="progres"><?= isset($this->content['values'][ $fdata['id'] ]) ? '100%' : '0%' ?></span>
                                </div>
                                <div class="del"><a class="del" href="#" onclick="$('#fupv<?=$count?>').text('0%');$('#fupl<?=$count?>').css('width','0%'); $('#fupath<?=$count?>').text('');return false;"><img src="/img/del.png" alt=""></a></div>
                            </div>
                            <input type="file" name="file<?=$id?>" id="file<?=$id?>" style="display: none"/>
                            <div style="margin: 10px; height: 32px; width:100%">
                                <a class="addfile" href="#" style="float:left; margin-right:0" onclick="addListener(<?=$count?>, <?=$fdata['id']?>); $('#file<?=$count?>').click(); return false;">Добавить файл</a>
                            </div>
                            <div class="clr"></div>
                            <?
                            //если поле предполагает зарузку 5 файлов (1 бит в числе)
                            if( $fdata['flags']&(1<<0) ){
                                $c = 0;
                                foreach( $this->content['afields'][ $fdata['id'] ] as $afdata ){
                                    $c++;
                                    $id = $count . $c;
                                    ?>
                                    <div class="file">
                                        <div id="fupath<?=$id?>" class="path"><?= isset($this->content['values'][ $afdata['id'] ]) ? '/upload/' . $this->content['values'][ $afdata['id'] ] : '' ?></div>
                                        <div class="load">
                                            <span class="bg">
                                              <span id="fupl<?=$id?>" class="line" style="width: <?= isset($this->content['values'][ $afdata['id'] ]) ? '100%' : '0%' ?>"></span>
                                            </span>
                                            <span id="fupv<?=$id?>" class="progres"><?= isset($this->content['values'][ $afdata['id'] ]) ? '100%' : '0%' ?></span>
                                        </div>
                                        <div class="del"><a class="del" href="#" onclick="$('#fupv<?=$id?>').text('0%');$('#fupl<?=$id?>').css('width','0%'); $('#fupath<?=$id?>').text('');return false;"><img src="/img/del.png" alt=""></a></div>
                                    </div>
                                    <input type="file" name="file<?=$id?>" id="file<?=$id?>" style="display: none"/>
                                    <a class="addfile" href="#" onclick="addListener(<?=$id?>, <?=$afdata['id']?>); $('#file<?=$id?>').click(); return false;">Добавить файл</a>
                                    <div class="clr"></div>
                                    <?
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="clr"></div>
            <?
            }
        ?>
        </form>
        <script type="text/javascript">
            function uploadFiles(url, files, id, fid) {
                var formData = new FormData();

                formData.append('fid', fid);

                for (var i = 0, file; file = files[i]; ++i) {
                    formData.append(file.name, file);
                }

                var xhr = new XMLHttpRequest();
                xhr.open('POST', url, true);
                xhr.onload = function(e) { $('#fupath'+id).text(e.currentTarget.responseText);};
                // Listen to the upload progress.
                xhr.upload.onprogress = function(e) {
                    if (e.lengthComputable) {
                        var prog = Math.round((e.loaded / e.total) * 100);

                        $('#fupv'+id).text(prog + '%');
                        $('#fupl'+id).css('width',prog+'%');
                    }
                };

                xhr.send(formData);
            }

            function addListener(id, fid){
                document.querySelector('input[id="file'+id+'"][type="file"]').addEventListener('change', function(e) {
                    uploadFiles('http://vps-1019820.srv.pa.infobox.ru/lk/documents/load', this.files, id, fid);
                }, false);
            }
        </script>
        <?
        if( $this->content['page'] < $numSteps ) { ?>
            <a class="next" href="#" onclick="if( $('#fudata') )$('#fudata').submit()">Далее</a>
            <div class="clr"></div>
        <?
        }
        ?>
            <!-- <div class="doc step-4">
                <div class="head">
                    <div class="item item-1">
                        <div class="small">Номер документа</div>
                        <div class="big">1</div>
                    </div>
                    <div class="item item-2">
                        <div class="small">Период</div>
                        <div class="big">Копия финансовой отчетности за 5 (пять) последних отчетных периода с отметкой налоговой инспекции (только для юридических лиц с общей системой налогооблажения), включающая:
                            Бухгалтерский баланс - форма №1</div>
                    </div>
                    <div class="item item-3">
                        <div class="small">Колличество файлов</div>
                        <div class="big">Количество файлов на дату заполнения</div>
                    </div>
                </div>
                <div class="files">
                    <div class="file">
                        <div class="path">С:\Users\kitchen\Google Диск\willance-админка\willance_main.txt</div>
                        <div class="load">
                    <span class="bg">
                      <span class="line" style="width: 60%"></span>
                    </span>
                            <span class="progres">60%</span>
                        </div>
                        <div class="del"><a class="del" href=""><img src="img/del.png" alt=""></a></div>
                    </div>
                    <a class="addfileno" href="">Добавить еще файл</a>
                    <div class="clr"></div>
                    <div class="file">
                        <div class="path">С:\Users\kitchen\Google Диск\willance-админка\willance_main.txt</div>
                        <div class="load">
                    <span class="bg">
                      <span class="line" style="width: 60%"></span>
                    </span>
                            <span class="progres">60%</span>
                        </div>
                        <div class="del"><a class="del" href=""><img src="img/del.png" alt=""></a></div>
                    </div>
                    <div class="clr"></div>
                    <div class="file">
                        <div class="path">С:\Users\kitchen\Google Диск\willance-админка\willance_main.txt</div>
                        <div class="load">
                    <span class="bg">
                      <span class="line" style="width: 60%"></span>
                    </span>
                            <span class="progres">60%</span>
                        </div>
                        <div class="del"><a class="del" href=""><img src="img/del.png" alt=""></a></div>
                    </div>
                    <div class="clr"></div>
                </div>
            </div> -->
            <div class="clr"></div>
        <?
        $this->end();
        return $this->content;
    }

    public function showBanks(){
        $this->start();
        ?>
        <h1>Выгрузка анкеты банка</h1>
        <div class="list">
        <?
        if( !empty($this->content['banks']) ){
            foreach($this->content['banks'] as $bankName=>$fileId){
                ?>
                <div class="item">
                    <div class="name"><?=$bankName?></div>
                    <div class="download"><a href="<?='/docs/form_'.$fileId.'.docx'?>">Скачать</a></div>
                </div>
            <?
            }
        }
        else{
            echo 'Анкета банка для скачивания недоступна.';
        }
        ?>
        </div>
        <div class="clr"></div>
        <?
        $this->end();
        return $this->content;
    }

    public function showContractorsForm(){
        $this->start();
        $result = $this->content['template'];
        foreach($this->content['fields'] as $name=>$field){
            $result = str_replace('%'.$name.'_caption%', $field['caption'], $result);
            $result = str_replace('%'.$name.'_value%', '', $result);
            $result = str_replace('%'.$name.'%', $name, $result);
        }
        ?>
        <form id="cform" action="/lk/contractors" method="post">
            <input type="hidden" name="tr" value="<?=$this->content['params']['tr']?>"/>
            <input type="hidden" name="ts" value="<?=$this->content['params']['ts']?>"/>
        <?=$result?>
        </form>
        <?
        $this->end();
        return $this->content;
    }

    public function showContractorsEditForm(){
        $this->start();
        $result = $this->content['template'];
        foreach($this->content['fields'] as $name=>$field){

            $result = str_replace('%'.$name.'%', $name, $result);
            $result = str_replace('%'.$name.'_caption%', $field['caption'], $result);

            switch( $field['type'] ){
                //text input
                case 1:
                    $result = str_replace('%'.$name.'_value%', $this->content['values'][ $field['id'] ], $result);
                    break;
                //select
                case 4:
                    for($j=1; $j<=4; $j++)
                        if( $j != $this->content['values'][ $field['id'] ] )
                            $result = str_replace('%'.$name.'_value'.$j.'%', '', $result);
                        else
                            $result = str_replace('%'.$name.'_value'.$j.'%', 'selected="selected"', $result);
                    break;
                default:
                    break;
            }


        }
        ?>
        <form id="cform" action="/lk/contractors" method="post">
            <input type="hidden" name="id" value="<?=$this->content['params']['id']?>"/>
            <input type="hidden" name="tr" value="<?=$this->content['params']['tr']?>"/>
            <input type="hidden" name="ts" value="<?=$this->content['params']['ts']?>"/>
            <?=$result?>
        </form>
        <?
        $this->end();
        return $this->content;
    }

    public function showContractors(){
        $this->start();
        ?>
        <script type="text/javascript">
            function addContractorParams(){
                return '?s=' + $('#s').val() + '&r=' + $('#r').val();
            }
        </script>
        <div  id="cover" style="width: 100%; height:100%; position:fixed; top: 67px; left: 122px; background-color: #808080; z-index: 998; display:none;">
            <div id="pctForm" class="list form" style="width: 820px; margin:200px auto; position: relative; z-index: 999; display:none; background-color: white;">
                <h2>Укажите параметры контрагента</h2>
                <span style="position: relative; top: -49px; left: 790px; cursor:pointer;" onclick="ShowHidePickContractorTypeForm()">X</span>
                <div class="item">
                    <div class="left">
                        <div class="inputitem">
                            <div class="select">
                                <label>
                                    <select id="s">
                                        <option value="0">Покупатель</option>
                                        <option value="1">Поставщик</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="inputitem">
                            <div class="select">
                                <label>
                                    <select id="r">
                                        <option value="0">Резидент</option>
                                        <option value="1">Нерезидент</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="next" onclick="window.location = '/lk/contractors'+addContractorParams()" href="#" style="position: relative; top: -5px; right: -670px;">Добавить</a>
            </div>
        </div>
        <h1>Список контрагентов</h1>
        <div class="list table">
            <?
            $count = 0;
            $result = '';
            foreach($this->content['clist'] as $cid=>$cdata){
                $contractor = '';

                $count++;
                $contractor .= '<div class="id">'.$count.'</div>';
                $contractor .= '<div class="name">'.$cdata['name'].'</div>';
                $contractor .= '<div class="col">'.($cdata['ts'] == 0 ? 'Покупатель' : 'Поставщик').'</div>';
                $contractor .= '<div class="col">'.($cdata['tr'] == 0 ? 'Резидент' : 'Нерезидент').'</div>';
                $contractor .= '<div class="phone"> - </div>';

                $contractor .= '<div class="load">
                                  <span class="bg">
                                    <span class="line" style="width: 60%"></span>
                                  </span>
                                  <span class="progres">60%</span>
                                </div>';

                $contractor .= '<div class="edit"><a href="/lk/contractors?edit='.$cid.'"><img src="/img/edit.png"></a></div>
                                <div class="del"><a href="/lk/contractors?del='.$cid.'"><img src="/img/del.png"></a></div>';

                $result .= '<div class="item">'.$contractor.'</div>';
            }

            if( $count == 0 ){
            ?>
                <div style="margin:20px;">Список контрагентов пуст.</div>
            <?
            }
            else{
            ?>
                <div class="item head">
                    <div class="id">№</div>
                    <div class="name">Название</div>
                    <div class="col">Тип</div>
                    <div class="col">Тип</div>
                    <div class="phone">Телефон</div>
                    <div class="load">Прогрес</div>
                </div>
            <?
                echo $result;
            }
            ?>
        </div>
        <div class="clr"></div>
        <script type="text/javascript">
            function ShowHidePickContractorTypeForm(){
                if( !$('#cover').is(":visible") ){
                    $('#cover').show();
                    $('#pctForm').show();
                }
                else{
                    $('#cover').hide();
                    $('#pctForm').hide();
                }
            }
        </script>
        <a class="add" href="#" onclick="ShowHidePickContractorTypeForm()">Добавить котрагента</a>
        <?
        $this->end();
        return $this->content;
    }

    public function showPform() {
        $this->start();
        ?>
        <h1>Прогрес главной анкеты</h1>
        <div class="stepline">
            <?
            $numSteps = $this->content['numSteps'];
            for( $i=1; $i<=$numSteps; $i++){
                $class = '';

                if( $i <= $this->content['progress'] ){
                    if( $i < $this->content['page'] ){
                        $class = 'active';
                    }
                    if( $i == $this->content['page'] ){
                        $class = 'current';
                    }
                }

                if( $i == $numSteps )
                    $class .= ' last';
                echo '  <div class="stepblock '.$class.'">
                            <div class="step">
                                <a href="/lk/pform?page='.$i.'">
                                    <div class="numb">'.$i.'</div>
                                </a>
                            </div>
                            <div class="line"></div>
                        </div>';
            }
            ?>
            <div class="clr"></div>
        </div>

        <div class="stepofstep"><?=$this->content['page']?> шаг (<?=$this->content['page']?> из 5)</div>
        <form id="fdata" action="" method="POST" style="margin-bottom: 20px">
            <input type="hidden" name="pform" value="<?=$this->content['page']?>"/>
            <?
            $result = $this->content['template'];
            foreach($this->content['fields'] as $fld){
                switch( $fld['type'] ){
                    //number field
                    case 2:
                    //data field
                    case 5:
                    //text field
                    case 1:
                        $val = '';
                        if( $this->content['values'][ $fld['id'] ] != null &&
                            $this->content['values'][ $fld['id'] ] != '' )
                            $val = $this->content['values'][ $fld['id'] ];

                        $result = str_replace('%'.$fld['name'].'%', $val, $result);
                        break;
                    //true-false field
                    case 3:
                        if( $this->content['values'][ $fld['id'] ] ){
                            $result = str_replace('chky_'.$fld['name'],'checked="checked"',$result);
                            $result = str_replace('chkn_'.$fld['name'],'',$result);
                        }
                        else{
                            $result = str_replace('chkn_'.$fld['name'],'checked="checked"',$result);
                            $result = str_replace('chky_'.$fld['name'],'',$result);
                        }
                        break;
                    //another composite field
                    case 6:
                        break;
                    //composite field
                    case 8:
                        $fld_ids = explode(',', $fld['validation']);
                        $fld_val = explode('#', $this->content['values'][ $fld['id'] ] );
                        foreach( $fld_ids as $count=>$fld_id ){
                            //if found stored composite field value
                            if( false !== strpos($fld_val[$count], '$') ){
                                $sub_ids = explode(',', $this->content['composite'][ $fld_id ]['validation']);
                                $sub_val = explode('$', $fld_val[$count]);
                                foreach( $sub_ids as $sub_count=>$sub_fld_id ){
                                    $result = str_replace('%'.$fld['name'].'_'.$this->content['composite'][ $fld_id ]['name'].'_'.$this->content['composite'][ $sub_fld_id ]['name'].'%', $sub_val[$sub_count], $result);
                                }
                            }
                            else{
                                //view default value for composite
                                if( $this->content['composite'][ $fld_id ]['type'] == 8 ){
                                    $sub_ids = explode(',', $this->content['composite'][ $fld_id ]['validation']);
                                    foreach( $sub_ids as $sub_count=>$sub_fld_id ){
                                        $result = str_replace('%'.$fld['name'].'_'.$this->content['composite'][ $fld_id ]['name'].'_'.$this->content['composite'][ $sub_fld_id ]['name'].'%', '', $result);
                                    }
                                }
                                //view default value for ordinary field
                                else
                                    $result = str_replace('%'.$fld['name'].'_'.$this->content['composite'][ $fld_id ]['name'].'%', $fld_val[$count], $result);
                            }
                        }
                        break;
                    default:
                        $result = str_replace('%'.$fld['name'].'%', '', $result);
                        break;
                }
            }
            echo $result;
            ?>
        </form>
        <? if( $this->content['page'] < $numSteps ) { ?>
            <a class="next" href="#" onclick="if( $('#fdata') )$('#fdata').submit()">Далее</a>
            <div class="clr"></div>
        <?
            }
        $this->end();
        return $this->content;
    }
}
