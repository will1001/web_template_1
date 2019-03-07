// Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content')
// Vue.prototype.$axios = window.axios;

Vue.component('tabeldatapenduduk',{
	template : '#tabeldatapenduduk',
	data:function () {
  		return {
  			no:1,
  			datapendudukjson:[],
  			datapendudukjsonbatas:{},
  			iddusun:1,
  			pagination:3,
  			csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
	  	}
	},
	created(){
		let uri ='http://127.0.0.1:8000/datawarga';
		Axios.get(uri).then((response) => {
			this.datapendudukjson = response.data;
		})
		console.log(response.data);
	},
	mounted () {
      let uri ='http://127.0.0.1:8000/datawarga';
		axios.get(uri).then((response) => {
			this.datapendudukjson = response.data;
		})
		console.log(response.data);
    },
	computed:{
		filteredPosts:function(){
			if(this.datapendudukjson.length){
				return this.datapendudukjson;
			}
		}
	},
	methods:{
    showperdusun(event){
    	// this.iddusun=event;
     //    console.log(this.datapendudukjson);
     let uri ='http://127.0.0.1:8000/datawarga';
		
		Vue.axios.get(uri).then((response) => {
			this.datapendudukjson = response.data;
		})

		console.log(uri);

    },
    setJson () {
        	let uri ='http://127.0.0.1:8000/datawarga';
		Axios.get(uri).then((response) => {
			this.datapendudukjson = response.data;
		})
		console.log("oke");
        },
    nextpage (payload) {
        	this.pagination=this.pagination+1;
        },
    prevpage (payload) {
        	this.pagination=this.pagination-1;
        }
}
});



Vue.component('buatsurat',{
	template : '#buatsurat',
});

Vue.component('tabelberita',{
	template : '#tabelberita',
});

Vue.component('tabelpengumuman',{
	template : '#tabelpengumuman',
});

Vue.component('tabelSOTK',{
	template : '#tabelSOTK',
});

Vue.component('tabelakunlogindesa',{
	template : '#tabelakunlogindesa',
});

Vue.component('Kewilayahan',{
	template : '#Kewilayahan',
});

Vue.component('Pembangunan',{
	template : '#Pembangunan',
});

Vue.component('halamanbisnis',{
	template : '#halamanbisnis',
});

Vue.component('untukpengunjung',{
	template : '#untukpengunjung',
});

Vue.component('lembagaindex',{
	template : '#lembagaindex',
	data:function () {
  		return {
	    	active_elcomp: 0,
	    	currentViewlembagaidex : "pemerintahan",
	  	}
	},
	methods:{
    testing(el){
        this.active_elcomp = el;
        console.log(this.active_elcomp);
    }
}
});

Vue.component('statistikindex',{
	template : '#statistikindex',
});



var vo = new Vue({
	el : '#app',
	data: {
		currentView : "tabeldatapenduduk",
		active_el : 0,
		isHidden : false
	},
	methods:{
    activate:function(el){
        this.active_el = el;
    }
  }
});

