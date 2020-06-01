<template>
    <v-app :dark="true">
        <v-navigation-drawer v-show="this.$route.path !== '/admin/signin'" v-model="drawer" :clipped="$vuetify.breakpoint.lgAndUp" app>
            <v-list dense>
                <template v-for="item in items">
                    <v-row v-if="item.heading" :key="item.heading" align="center">
                        <v-col cols="6">
                            <v-subheader v-if="item.heading">{{ item.heading }}</v-subheader>
                        </v-col>
                    </v-row>
                    <v-list-group v-else-if="item.children" :key="item.text" v-model="item.model" :prepend-icon="item.model ? item.icon : item['icon-alt']" append-icon>
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title>{{ item.text }}</v-list-item-title>
                            </v-list-item-content>
                        </template>
                        <v-list-item v-for="(child, i) in item.children" :to="child.link" :key="i" link>
                            <v-list-item-action v-if="child.icon">
                                <v-icon>{{ child.icon }}</v-icon>
                            </v-list-item-action>
                            <v-list-item-content>
                                <v-list-item-title>{{ child.text }}</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list-group>
                    <v-list-item velse :key="item.text" :to="item.link" link>
                        <v-list-item-action>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>{{ item.text }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </template>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar v-show="this.$route.path !== '/admin/signin'" :clipped-left="$vuetify.breakpoint.lgAndUp" app color="darken-3" dark>
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-toolbar-title style="width: 300px;" class="ml-0 pl-4">
                <span>{{ $t('horizonpanel') }}</span>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon>
                <v-icon>mdi-apps</v-icon>
            </v-btn>
            <v-btn icon>
                <v-icon>mdi-bell</v-icon>
            </v-btn>
            <div class="text-center">
                <v-menu offset-y>
                    <template v-slot:activator="{ on }">
                        <v-btn icon large>
                            <v-avatar size="32px" v-on="on" item>
                                <v-img src="https://cdn.vuetifyjs.com/images/logos/logo.svg" alt="Vuetify"></v-img>
                            </v-avatar>
                        </v-btn>
                    </template>
                    <v-list>
                        <v-list-item @click="signout">
                            <v-icon>mdi-logout</v-icon>
                            <v-list-item-title>{{ $t('sign_out') }}</v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>
            </div>
        </v-app-bar>

        <v-content :class="{'no-padding': this.$route.path === '/admin/signin'}">
            <router-view></router-view>
        </v-content>
    </v-app>
</template>

</template>

<script>
    import t from "@/plugins/multilanguage";
    import axios from "axios";

    export default {
        name: "App",
        data: () => ({
            drawer: null,
            app_bar: false,
            items: [
                { icon: "mdi-home", text: t.t("home"), link: "/admin" },
                { icon: "mdi-account-group", text: t.t("clients"), link: "/admin/clients" },
                {
                    icon: "mdi-chevron-up",
                    "icon-alt": "mdi-chevron-down",
                    text: t.t("orders"),
                    model: false,
                    children: [
                        { text: t.t("list_all_orders"), link: "/admin/orders" },
                        { text: t.t("add_new_order"), link: "/admin/orders/new" },
                    ],
                },
                {
                    icon: "mdi-chevron-up",
                    "icon-alt": "mdi-chevron-down",
                    text: t.t("billing"),
                    model: false,
                    children: [{ text: t.t("list_transactions") }],
                },
                { icon: "mdi-face-agent", text: t.t("support"), link: "/admin/support" },
                { icon: "mdi-account-cog", text: t.t("personal_preferences"), link: "/admin/preferences" },
                { icon: "mdi-settings", text: t.t("app_config"), link: "/admin/configuration" },
            ],
        }),
        watch: {
            $route(to, from) {
                console.log(this.$route)
                document.title = t.t('horizonpanel') + " - " + to.name;
            },
        },
        methods: {
            signout() {
                this.$toast(t.t('sign_out') + "...");

                axios.post(window.location.origin + '/api/auth/signout', {}, {
                    headers: {
                        "Accept": "application/json",
                        "Authorization": "Bearer " + "test",
                    }
                });
            }
        }
    };
</script>

<style>
    .theme--dark.v-list-item--active::before {
        opacity: 0 !important;
    }
    .v-list-item--link {
        color: #fff !important;
    }
    .no-padding {
      padding: 0 !important;
    }
</style>
