


Vue.component('indexpage',{
	template : '#indexpage',
	props: ['value'],
	data:function () {
  		return {
	    	active_elcomp: 0,
	    	currentViewBidangPemerintahan : "pemerintahan",
	  	}
	},
	methods:{
    showselayangpandang(){
    	this.$emit('clicked', "selayangpandang",true);


    }
}
});


Vue.component('bidangpemerintahan',{
	template : '#bidangpemerintahan',
	data:function () {
  		return {
	    	active_elcomp: 0,
	    	currentViewBidangPemerintahan : "pemerintahan",
	  	}
	},
	methods:{
    testing(el){
        this.active_elcomp = el;
        console.log(this.active_elcomp);
    }
}
});

//sub componen pemerintahan
Vue.component('Pemerintahan',{
	template : '#Pemerintahan',
});

Vue.component('selayangpandang',{
	template : '#selayangpandang',
});

Vue.component('Kesejahteraan',{
	template : '#Kesejahteraan',
});

Vue.component('Pelayanan',{
	template : '#Pelayanan',
});

Vue.component('Tata_Usaha_dan_Umum',{
	template : '#Tata_Usaha_dan_Umum',
});

Vue.component('Keuangan',{
	template : '#Keuangan',
});

Vue.component('Perencanaan',{
	template : '#Perencanaan',
});

Vue.component('Kewilayahan',{
	template : '#Kewilayahan',
});

Vue.component('Pembangunan',{
	template : '#Pembangunan',
});


// ---------------------

Vue.component('LKMD',{
	template : '#LKMD',
});

Vue.component('BPD',{
	template : '#BPD',
});

Vue.component('PKK',{
	template : '#PKK',
});

Vue.component('Karang_Taruna',{
	template : '#Karang_Taruna',
});

Vue.component('GAPOKTAN',{
	template : '#GAPOKTAN',
});

Vue.component('POKDARWIS',{
	template : '#POKDARWIS',
});

// sub component lembaga


//-----------

Vue.component('panduanpenduduk',{
	template : '#panduanpenduduk',
	data:function () {
  		return {
  			caritext:'',
	    	panduans:[
	    		{
	    			title: 'Panduan Beasiswa LPDP',
	    			link:'https://www.lpdp.kemenkeu.go.id',
	    		},
	    		{
	    			title:'Panduan BPJS',
	    			link:'https://www.bpjs-kesehatan.go.id/bpjs/',
	    		},
	    		{
	    			title:'Petunjuk penempatan TKI perorangan',
	    			link:'http://www.bnp2tki.go.id/read/8998/Petunjuk-Penempatan-TKI-Perseorangan.html',
	    		},
	    		{
	    			title:'Panduang mengurus administrasi setelah menikah',
	    			link:'https://www.bridestory.com/id/blog/panduan-mengurus-5-administrasi-penting-setelah-menikah',
	    		},
	    		{
	    			title:'Mengurus akta nikah',
	    			link:'https://www.finansialku.com/mengurus-catatan-sipil-akta-nikah/amp/',
	    		},
	    		{
	    			title:'Cara mengurus SIUP (Surat Izin Usaha Perdagangan)',
	    			link:'https://www.cermati.com/artikel/cara-membuat-siup-surat-izin-usaha-perdagangan',
	    		},
	    		{
	    			title:'Cara bayar pajak online',
	    			link:'https://www.online-pajak.com/e-billing-pajak-cara-bayar-pajak-online',
	    		},
	    		{
	    			title:'E-billing pajak',
	    			link:'http://www.pajak.go.id/content/e-billing',
	    		},
	    		{
	    			title:'Pasang meter listrik',
	    			link:'https://www.pln.co.id',
	    		},
	    	]
	  	}
	},
	computed : {
        	caripanduans:function(){
        			return this.panduans.filter((panduan) => {
        			return panduan.title.toLowerCase().match(this.caritext)
        		   });

        	}
        },
});

Vue.component('halamanbisnis',{
	template : '#halamanbisnis',
});

Vue.component('agenda',{
	template : '#agenda'
});

Vue.component('untukpengunjung',{
	template : '#untukpengunjung',
});

Vue.component('lembagaindex',{
	template : '#lembagaindex',
	data:function () {
  		return {
	    	active_elcomp: 0,
	    	currentViewlembagaidex : "LKMD",
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
	data:function () {
  		return {
  			caritext:'',
	    	datadesas:[
	    		{
	    			title: 'Dana Desa',
	    			link:'https://desapringgajurang.id/dokumen/Dana_Desa.pdf',
	    		},
	    		{
	    			title:'Profil Desa',
	    			link:'https://desapringgajurang.id/dokumen/Profil%20Desa%20PRINGGAJURANG.pdf',
	    		}
	    	]
	  	}
	},
	computed : {
        	caridatadesas:function(){
        			return this.datadesas.filter((datadesa) => {
        			return datadesa.title.toLowerCase().match(this.caritext)
        		   });

        	}
        },
});


var vo = new Vue({
	el : '#app',
	data: {
		currentView : "indexpage",
		active_el : 0,
		isHidden : false
	},
	methods:{
    activate:function(el){
        this.active_el = el;
        console.log(this.active_el);
    },
    updatecurrentview:function(el,el2){
        this.currentView = el;
        this.isHidden = el2;
    }
  }
});

