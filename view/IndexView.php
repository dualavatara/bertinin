<?php
/**
 * User: dualavatara
 * Date: 4/1/12
 * Time: 1:18 AM
 */

namespace View;

class IndexView extends BaseView {

	public function show() {
		$this->start();
        ?>
        <div class="carousel slide" id="featured_carousel">
            <div class="carousel-inner">
                <div class="item">
                    <img alt="About us" src="/assets/about_us-d898cded862cd7a7421e31e14bae11cb.jpg">
                    <div class="container">
                        <a href="/ru/about_us"><div class="carousel-caption">
                                <h4>
                                    <span>Отзывы клиентов</span>
                                </h4>
                                <p>
                                    Наши клиенты о нас говорят: проверено – можно доверять!
                                <span>
                                Узнать больше »
                                </span>
                                </p>
                            </div>
                        </a></div>
                </div>
                <div class="item active">
                    <img alt="Advantages" src="/assets/advantages-83a9e4d3ea86b152fe5d73fe81519525.jpg">
                    <div class="container">
                        <a href="/ru/advantages"><div class="carousel-caption"><ol class="carousel-indicators">
                                    <li class="" data-slide-to="0" data-target="#featured_carousel"></li>
                                    <li class="active" data-slide-to="1" data-target="#featured_carousel"></li>
                                    <li class="" data-slide-to="2" data-target="#featured_carousel"></li>
                                </ol>
                                <h4>
                                    <span>Почему Willance</span>
                                </h4>
                                <p>
                                    Мы работаем вместе с вами. Понимаем потребности вашего бизнеса. Мы экономим ваши деньги, усилия и время.
                                <span>
                                Узнать больше »
                                </span>
                                </p>
                            </div>
                        </a></div>
                </div>
                <div class="item">
                    <img alt="Solutions" src="/assets/solutions-157fb918fa112d17f7e4667c7f254507.jpg">
                    <div class="container">
                        <a href="/ru/solutions"><div class="carousel-caption">
                                <h4>
                                    <span>Наши решения</span>
                                </h4>
                                <p>
                                    В качестве профессионального факторингового брокера, мы объясняем просто, помогаем эффективно, поддерживаем надежно.
                                <span>
                                Узнать больше »
                                </span>
                                </p>
                            </div>
                        </a></div>
                </div>
            </div>
            <a class="carousel-control left" data-slide="prev" href="#featured_carousel">‹</a>
            <a class="carousel-control right" data-slide="next" href="#featured_carousel">›</a>
        </div>
        <?
		$this->end();
		return $this->content;
	}
}
