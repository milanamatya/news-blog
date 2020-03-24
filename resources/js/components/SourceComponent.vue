<template>
	<div class="kt-section">
		<div class="kt-section__content kt-section__content--border kt-section__content--fit" style="max-height: 500px; overflow-y: scroll;">
			<ul class="kt-nav" >
				<li class="kt-nav__section kt-nav__section--first">
					<span class="kt-nav__section-text">Sources</span>
				</li>

				<li class="kt-nav__item" v-show="loading">
					<a  href="javascript:(0);" class="kt-nav__link">
						<span class="kt-nav__link-text">Loading...</span>
					</a>
				</li>

				<li class="kt-nav__item" v-for="source in sources" @click="$emit('search',source.id)">
					<a href="javascript:(0);" class="kt-nav__link">
						<span class="kt-nav__link-text">{{ source.name }}</span>
					</a>

					
				</li>
			</ul>
		</div>
	</div>
</template>

<script type="text/javascript">
	
	export default {
		created(){
			this.getSourceList();
		},
		data(){
			return {
				loading : 1,
				sources : []
			}
		},
		methods:{
			getSourceList(){
				let self = this;
				axios.get('/api/getSourceList')
				  .then(function (response) {
				    if(response.data.status == 'ok'){
				    	self.loading = 0;
				    	self.sources = response.data.sources
				    }
				  })
				  .catch(function (error) {
				    console.log(error);
				  })
				  .then(function () {
				  });
			}
		}
	}
</script>