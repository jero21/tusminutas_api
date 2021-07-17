<template>
	<app-layout id="inspire" app dark>
		
			<inertia-link :href="route('users')" class="text-decoration-none">
		        <h2 color="black" class="text-center" >Total usuarios registrados: {{ count_users }} </h2>
	      	</inertia-link>
      	
	</app-layout> 				
</template>
<script>
import AppLayout from '../Layouts/AppLayout'
export default {
	components: {
		AppLayout
	},
	props: {
	    count_users: '',
	  },
	data() {
		return {
			//
		}
	}
}
</script>