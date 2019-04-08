Vue.component('v-footer', {

	props: ['content'],
	data: function (props) {
	    
	    var seen;
	  	var content = props.content;

	  	if(content == ''){

	  		return {
	  			seen : false
	  		}

	  	}else{

	  		return {
	  			seen : true
	  		}

	  	}

	},
	template: '<div class="footer" v-if="seen"  v-cloak>{{ content }}</div>'
})

Vue.component('data-list', {

	props: ['article'],
	data: function (props) {

		

	}

})