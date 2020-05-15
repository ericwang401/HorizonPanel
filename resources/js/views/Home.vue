<template>
    <div>

        <v-row no-gutters>
            <v-col md="3" sm="6" class="pa-4 mx-auto col-12">
                <v-card class="pa-4">
                    <v-row>

                        <v-col class="npt">
                            <h4>{{ $t('pending_orders') }}</h4>
							<h2>69</h2>
                        </v-col>
                        <v-col class="col-auto npt">
							<div class="icon-circle blue">
								<v-icon>mdi-cart</v-icon>
							</div>
                            
                        </v-col>
                    </v-row>
                </v-card>
            </v-col>

            <v-col md="3" sm="6" class="pa-4 mx-auto col-12">
                <v-card class="pa-4">
                    <v-row>

                        <v-col class="npt">
                            <h4>{{ $t('tickets_waiting') }}</h4>
							<h2>420</h2>
                        </v-col>
                        <v-col class="col-auto npt">
							<div class="icon-circle teal">
								<v-icon>mdi-face-agent</v-icon>
							</div>
                            
                        </v-col>
                    </v-row>
                </v-card>
            </v-col>

            <v-col md="3" sm="6" class="pa-4 mx-auto col-12">
                <v-card class="pa-4">
                    <v-row>

                        <v-col class="npt">
                            <h4>{{ $t('pending_cancellations') }}</h4>
							<h2>69</h2>
                        </v-col>
                        <v-col class="col-auto npt">
							<div class="icon-circle red">
								<v-icon>mdi-rotate-right</v-icon>
							</div>
                            
                        </v-col>
                    </v-row>
                </v-card>
            </v-col>

            <v-col md="3" sm="6" class="pa-4 mx-auto col-12">
                <v-card class="pa-4">
                    <v-row>

                        <v-col class="npt">
                            <h4>{{ $t('server_health') }}</h4>
							<h2>{{ $t('good') }}</h2>
                        </v-col>
                        <v-col class="col-auto npt">
							<div class="icon-circle green">
								<v-icon>mdi-server</v-icon>
							</div>
                            
                        </v-col>
                    </v-row>
                </v-card>
            </v-col>
        </v-row>
    </div>
</template>

<script>
    export default {
        name: "Home"
    }
</script>

<style scoped>
.npt {
	padding-top: 0 !important;
}
.icon-circle {
	display: inline-flex;
    width: 3rem;
    height: 3rem;
	border-radius: 100%;
    align-items: center;
    justify-content: center;
}
</style>