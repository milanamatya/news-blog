<template>
	<div class="row">
                                    
	    <div class="col-xl-12 col-lg-12">
	    		<div v-show="loading==1" class="kt-portlet kt-portlet--height-fluid kt-widget19" style="cursor: pointer;">
		            <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
		                <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides" style="height: 300px;">
			                <i class="fa fa-spinner fa-spin" style="font-size:100px; margin-left: 40%; top: 36%; position: relative;"></i>
		                </div>
		            </div>
		        </div>

		        <div v-show="loading==0 && newsList.length == 0"class="kt-portlet kt-portlet--height-fluid kt-widget19" style="cursor: pointer;">
		            <div class="kt-portlet__body">
				        <div class="kt-widget19__wrapper">
				            <div class="kt-widget19__text">
				                Not available. 
				            </div>
				        </div>
				    </div>
		        </div>

	        	<div v-show="loading==0" v-for="news in newsList" @click="show(news)" class="kt-portlet kt-portlet--height-fluid kt-widget19" style="cursor: pointer;">
		            <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
		                <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides" style="height: 300px;">
		                	<img :src="news.urlToImage" style="height: 100%; object-fit: cover ">
		                    <h3 class="kt-widget19__title kt-font-light">
		                        {{ news.title}}
		                    </h3>
		                    <div class="kt-widget19__shadow"></div>
		                    <div class="kt-widget19__labels">
		                        <!-- <a href="#" style="cursor: pointer !important; " class="btn btn-label-light-o2 btn-bold ">View</a> -->
		                    </div>
		                </div>

		                <!-- <div v-show="loading" class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides" style="height: 300px;">
		                	
			                <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
		                </div> -->
		            </div>

		            <div class="kt-portlet__body">
				        <div class="kt-widget19__wrapper">
				            <div class="kt-widget19__text">
				                {{ news.description }}
				            </div>
				        </div>
				    </div>
		        </div>
	    </div>


	        <!--end:: Widgets/Blog-->
	</div>
</template>
import Source from './SourceComponent.vue'
<script type="text/javascript">
	
	export default {
		created(){
			this.getNews();
		},
		data(){
			return {
				loading : 1,
				newsList : []
			}
		},
		methods:{
			show(news){
				this.$emit('view',news);
				// window.open(url,'_show');
			},
			getNews(){
				let self = this;
				axios.get('/api/getNewsList')
				  .then(function (response) {
				    if(response.data.status == 'ok'){
				    	self.loading = 0;
				    	self.newsList = response.data.articles
				    }
				  })
				  .catch(function (error) {
				    console.error(error);
				  })
				  .then(function () {
				    // always executed
				  });
			},
			getNewsBySource(source){
				let self = this;
				self.loading = 1;
				axios.get('/api/getNewsListSource/'+source)
				  .then(function (response) {
				    // handle success
				    if(response.data.status == 'ok'){
				    	self.loading = 0;
				    	self.newsList = response.data.articles
				    }
				  })
				  .catch(function (error) {
				    // handle error
				    console.error(error);
				  })
				  .then(function () {
				    // always executed
				  });
			},

			getNewsByCountry(country){
				let self = this;
				self.loading = 1;
				axios.get('/api/getNewsByCountry/'+country)
				  .then(function (response) {
				    // handle success
				    if(response.data.status == 'ok'){
				    	self.loading = 0;
				    	self.newsList = response.data.articles
				    }
				  })
				  .catch(function (error) {
				    // handle error
				    console.error(error);
				  })
				  .then(function () {
				    // always executed
				  });
			}
		}
	}
</script>