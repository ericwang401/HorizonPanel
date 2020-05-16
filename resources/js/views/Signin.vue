<template>
	<div>
		<div class="row signin-container">
			<v-col class="signin-col">
				<v-card outlined>
					<v-container>
						<v-form @submit="validate" @submit.prevent>
							<h2 class="text-center">{{ $t('horizonpanel') }}</h2>
							<span class="headline mt-2 text-center">{{ $t('sign_in') }}</span>
							<span class="subtitle-1 mt-2 text-center">{{ $t('to_continue') }}</span>
							<v-text-field label="Email" v-model="email" :error-messages="emailErrors" class="mt-5 pl-3 pr-3" outlined required></v-text-field>
							<div class="submit-block pr-3">
								<v-btn class="float-right" @click="validate" depressed color="primary">{{ $t('next') }} <v-icon right>mdi-arrow-right-circle</v-icon></v-btn>
							</div>
						</v-form>
					</v-container>
				</v-card>
			</v-col>
		</div>
	</div>
</template>

<script>
	import t from "@/plugins/multilanguage";
	export default {
		name: "signin",
		data: () => ({
			email: '',
			emailErrors: [],
		}),
		methods: {
			validate()
			{
				this.emailErrors = /.+@.+/.test(this.email) ? [] : [t.t('invalid_email')]
			}
		}
	}
</script>

<style scoped>
	.signin-container {
		flex-direction: column;
		min-height: 100vh;
	}
	@media (min-width: 601px) {
		.signin-container::before {
			content: '';
			display: block;
			flex-grow: 0.7;
			height: 30px;
			-webkit-box-flex: 1
		}
		.signin-container::after {
			content: '';
			display: block;
			flex-grow: 0.5;
			height: 30px;
			-webkit-box-flex: 1
		}
	}
	.signin-col {
		width: 450px;
		margin: 0 auto;
		flex-basis: 0 !important;
    	flex-grow: 1 !important;
	}

	.submit-block {
		height: 40px;
	}

	span {
		display: block;
	}
</style>