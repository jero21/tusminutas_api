<template>
	<v-app id="inspire" app dark>
	  	<v-container>
	  		<Nav />
	  		<v-main>
	  			<v-row>
	  				<v-col>
	  					<slot></slot>
	  				</v-col>
	  			</v-row>
	  		</v-main>
	  	</v-container>
	</v-app>
</template>
<script>
import Nav from '../components/Nav'
export default {
	components: {
		Nav
	}
}
</script>
