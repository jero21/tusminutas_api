<template>
	<app-layout>
		<h2 class="text-center">Usuarios</h2>
		<v-data-table
		    :headers="headers"
		    :items="users"
		    :items-per-page="20"
		    class="elevation-1"
	  	>
	  	</v-data-table>
	</app-layout> 				
</template>
<script>
import AppLayout from '../../Layouts/AppLayout'
export default {
	components: {
		AppLayout
	},
	props: {
	    users: Array,
	  },
	data() {
		return {
			headers: [
	          { text: 'Nombre', value: 'nombre' },
	          { text: 'Email', value: 'email' },
	          { text: 'Minutas', value: 'minutas' },
	          { text: 'Compartido con', value: 'compartido' },
	          { text: 'Cuena', value: 'cuenta' }
	        ]
		}
	}
}
</script>