{* {include file="Include/HeroSlider.tpl"}
{include file="Include/Categories.tpl"}
{include file="Include/OurBestsellers.tpl"}
{include file="Include/PopularCategories.tpl"}
{include file="Include/PopularFamilyHomes.tpl"}
{include file="Include/HousePlansWithInteriorDesign.tpl"}
{include file="Include/StepsToBuildingAHome.tpl"}
{include file="Include/Testimonials.tpl"}
{include file="Include/Contact.tpl"}
{include file="Include/Products.tpl"}
{include file="Include/Partners.tpl"}
{include file="Include/Newsletter.tpl"} *}
{include file="Include/FeaturedVideo.tpl"}
{include file="Include/Tips.tpl"}
{include file="Include/Offer.tpl"}
{include file="Include/Initiative.tpl"}
{include file="Include/Charity.tpl"}
{include file="Include/ArticlesTicks.tpl"}

<div class="overlay">
	<div class="overlay-project-box" id="over-pop">
		<div id="over-img-box">
			<ul id="over-pics">
				<li><span id="over-render" class="selected">Wizualizacja</span></li>
				<li><span id="over-ground" class="noview">Rzut parteru</span></li>
				<li><span id="over-floor" class="noview">Rzut piętra</span></li>
				<li><span id="over-loft" class="noview">Rzut poddasza</span></li>
			</ul>
			<a href="">
				<img class="preload" id="over-img" src="/img/dummy.png" width="1350" height="900" alt="Render">
			</a>
		</div>

		<ul id="over-params">
			<li>
				<h6 id="over-name"></h6>
			</li>
			<li class="small"><span id="over-txt"></span></li>
			<li><span id="over-version"></span></li>
			<li>
				<p>ilość pokoi: <span id="over-rooms"></span></p>
			</li>
			<li>
				<p>powierzchnia użytkowa: <strong id="over-area"></strong> m<sup>2</sup></p>
			</li>
			<li>
				<p>min. wymiary działki: <span id="over-parcel"></span> m</p>
			</li>
			<li>
				<p>wysokość budynku: <span id="over-height"></span> m</p>
			</li>
			<li>
				<p>kąt nachylenia dachu: <span id="over-angle"></span></p>
			</li>
			<li>
				<p>cena projektu: <span id="over-price"></span> zł</p>
			</li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>

		<button type="button" class="overlay-change prev" id="prev-overlay">poprzedni</button>
		<button type="button" class="overlay-change next" id="next-overlay">następny</button>
	</div>

	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div>