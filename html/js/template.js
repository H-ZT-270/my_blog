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

	props: ['list'],
	data: function (props) {
	    
	    var seen;
	  	var content = props.list;
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
	template: '<ul class="data-list" v-if="seen"><li  v-for="v in list"><span class="time">{{ v.time }}</span><span class="article"><h4>{{ v.title }}</h4><p>{{ v.remark }}</p><a v-bind:href="v.href">查看更多</a></span></li></ul>',

})