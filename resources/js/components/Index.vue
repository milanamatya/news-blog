<template>
	<div class="row">
		<div class="col-md-3 col-lg-3">
			<source-component style="position: fixed; width: 20%" @search="getNewsBySource"></source-component>
		</div>
		<div class="col-md-6 col-lg-6">
			<news-list-component ref="news"></news-list-component>
		</div>

		<div class="col-md-3 col-lg-3">
			<div class="kt-section" style="position: fixed; width: 20%">
						<div class="kt-section__content kt-section__content--border kt-section__content--fit"style="overflow-y: scroll; max-height: 500px">
							<ul class="kt-nav kt-nav--bold kt-nav--md-space kt-nav--v3">
								<li class="kt-nav__section kt-nav__section--first">
									<span class="kt-nav__section-text">Countries</span>
								</li>
				                <li class="kt-nav__item" v-for="country in countries" @click="$refs.news.getNewsByCountry(country.code)">
				                	<a class="kt-nav__link" href="javascript:(0);">
										<span class="kt-nav__link-text">{{country.name}}</span>
									</a>
				                </li>
				        </ul>
							
						</div>
					</div>
		</div>
	</div>
</template>
<script type="text/javascript">
	import NewsListComponent from './NewsListComponent.vue'
	import SourceComponent from './SourceComponent.vue'
	export default {
		data(){
			return {
				countries: [
					{
						name : 'Argentina',
						code : 'ar'
					},
					{
						name : 'Australia',
						code : 'au'
					},
					{
						name : 'Austria',
						code : 'at'
					},
					{
						name : 'Belgium',
						code : 'be'
					},
					{
						name : 'Brazil',
						code : 'br'
					},
					{
						name : 'Bulgaria',
						code : 'bg'
					},
					{
						name : 'Canada',
						code : 'ca'
					},
					{
						name : 'China',
						code : 'cn'
					},
					{
						name : 'Colombia',
						code : 'co'
					},
					{
						name : 'Cuba',
						code : 'cu'
					},
					{
						name : 'Czech Republic',
						code : 'cz'
					},
					{
						name : 'Egypt',
						code : 'eg'
					},
					{
						name : 'France',
						code : 'fr'
					},
					{
						name : 'Germany',
						code : 'de'
					},
					{
						name : 'Greece',
						code : 'gr'
					},
					{
						name : 'Hong Kong',
						code : 'hk'
					},
					{
						name : 'Hungary',
						code : 'hu'
					},
					{
						name : 'India',
						code : 'in'
					},
					{
						name : 'Indonesia',
						code : 'id'
					},
					{
						name : 'Ireland',
						code : 'ie'
					},
					{
						name : 'Israel',
						code : 'il'
					},
					{
						name : 'Italy',
						code : 'it'
					},
					{
						name : 'Japan',
						code : 'jp'
					},
					{
						name : 'Latvia',
						code : 'lv'
					},
					{
						name : 'Lithuania',
						code : 'lt'
					},
					{
						name : 'Malaysia',
						code : 'my'
					},
					{
						name : 'Mexico',
						code : 'mx'
					},
					{
						name : 'Morocco',
						code : 'ma'
					},
					{
						name : 'Netherlands',
						code : 'nl'
					},
					{
						name : 'New Zealand',
						code : 'nz'
					},
					{
						name : 'Nigeria',
						code : 'ng'
					},
					{
						name : 'Norway',
						code : 'no'
					},
					{
						name : 'Philippines',
						code : 'ph'
					},
					{
						name : 'Poland',
						code : 'pl'
					},
					{
						name : 'Portugal',
						code : 'pt'
					},
					{
						name : 'Romania',
						code : 'ro'
					},
					{
						name : 'Russia',
						code : 'ru'
					},
					{
						name : 'Saudi Arabia',
						code : 'sa'
					},
					{
						name : 'Serbia',
						code : 'rs'
					},
					{
						name : 'Singapore',
						code : 'sg'
					},
					{
						name : 'Slovakia',
						code : 'sk'
					},
					{
						name : 'Slovenia',
						code : 'si'
					},
					{
						name : 'South Africa',
						code : 'za'
					},
					{
						name : 'South Korea',
						code : 'kr'
					},
					{
						name : 'Sweden',
						code : 'se'
					},
					{
						name : 'Switzerland',
						code : 'ch'
					},
					 
					{
						name : 'Taiwan',
						code : 'tw'
					},
					{
						name : 'Thailand',
						code : 'th'
					},
					{
						name : 'Turkey',
						code : 'tr'
					},
					{
						name : 'UAE',
						code : 'ae'
					},
					{
						name : 'Ukraine',
						code : 'ua'
					},
					{
						name : 'United Kingdom',
						code : 'gb'
					},
					{
						name : 'United States',
						code : 'us'
					},
					{
						name : 'Venuzuela',
						code : 've'
					},

				]
			}
		},
		components : {
			NewsListComponent,
			SourceComponent,
		},
		methods:{
			getNewsBySource(e){
				this.$refs.news.getNewsBySource(e);
			},
		}
	}
</script>