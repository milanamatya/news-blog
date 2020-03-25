<template>
	<div class="row">
		<modal-component v-show="showModalFlag == 1">
			<h3 slot="header">{{news.title}}</h3>
			<div slot="body">
				<div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
	                <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides" style="height: 300px;">
	                	<img :src="news.urlToImage" style="height: 100%; object-fit: cover ">
	                    <div class="kt-widget19__shadow"></div>
	                    <div class="kt-widget19__labels">
	                    </div>
	                </div>
	            </div>
				<span v-html="news.content" style="font-size: 15px">
					
				</span>
				
			</div>
			<template slot="footer">
				<div class="mr-auto">
					<button type="button" class="btn btn-secondary  btn-lg btn-icon btn-circle" @click="likeDislikeNews(1)">{{ findViews(1) }}&nbsp;<i class="fa fa-thumbs-up"></i></button>
					<button type="button" class="btn btn-secondary  btn-lg btn-icon btn-circle" @click="likeDislikeNews(0)">{{ findViews(0) }}&nbsp;<i class="fa fa-thumbs-down"></i></button>
				</div>
				<button class="btn btn-primary btn-md" @click="showModalFlag = 0">Close</button>
				
			</template>
		</modal-component>
		<div class="col-md-3 col-lg-3">
			<source-component style="position: fixed; width: 20%" @search="getNewsBySource"></source-component>
		</div>
		<div class="col-md-6 col-lg-6">
			<news-list-component @view="showModal" ref="news"></news-list-component>
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
	import ModalComponent from './ModalComponent.vue'
	import SourceComponent from './SourceComponent.vue'
	export default {
		data(){
			return {
				news : {
					title : '',
					description : '',
					source : {
						id : '',
						name : ''
					},
					author: '',
					url: '',
					urlToImage : '',
					publishedAt : '',
					content : ''
				},
				views: [
				],
				showModalFlag : 0,
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
			likeDislikeNews(flag){
				let self = this;
				axios.post('/api/likeDislikeNews', {
				    flag,
				    sourceName: self.news.source.name,
				    title : self.news.title
				  })
				  .then(function (response) {
				    self.views = response.data.data;
				  })
				  .catch(function (error) {
				    console.log(error);
				  });
			},
			findViews(type){
				let flag = _.find(this.views, ['flag', type]);
				return flag===undefined ? 0 : flag.count_flag;
			},
			showModal(news){
				console.log(news);
				let self = this;
				this.news = news;
				axios.post('/api/getUsersViews', {
				    sourceName: news.source.name,
				    title : news.title
				  })
				  .then(function (response) {
				    self.views = response.data.data;
					self.showModalFlag = 1;
				  })
				  .catch(function (error) {
				    console.log(error);
				  });

			},
			getNewsBySource(e){
				this.$refs.news.getNewsBySource(e);
			},
		}
	}
</script>