<template>
  <app-layout id="inspire" app dark>
    <h2 class="text-center mb-3">Dashboard</h2>
    <v-row>
      <v-col cols="5" offset-sm="0">
        <v-card>
          <v-subheader> USUARIOS </v-subheader>
            <v-divider></v-divider>
            <v-list>
              <template>
                <v-list-item>
                  <v-list-item-content>
                    <v-list-item-title>
                      <inertia-link :href="route('users')" class="text-decoration-none">
                        <v-icon> mdi-account-multiple </v-icon> 
                        Total: {{ count_users }}
                      </inertia-link>
                    </v-list-item-title>
                  </v-list-item-content>
                  <v-list-item-content>
                    <v-list-item-title>
                      <Link href="/users/account_type/" method="post" :data="{ account_type: 1 }" class="text-decoration-none">
                        <v-icon> mdi-account </v-icon>
                        Plan Básico: {{ count_users_basic }}
                      </Link>
                    </v-list-item-title>
                  </v-list-item-content>
                  <v-list-item-content>
                    <v-list-item-title>
                      <Link href="/users/account_type/" method="post" :data="{ account_type: 2 }" class="text-decoration-none">
                        <v-icon> mdi-account-check </v-icon>
                        Plan Profesional: {{ count_users_profetional }}
                      </Link>
                    </v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </template>
            </v-list>
          </v-card>
        </v-col>
        <v-col cols="5">
          <v-card>
            <v-subheader> MINUTAS </v-subheader>
            <v-divider></v-divider>
            <v-list>
              <template>
                <v-list-item>
                  <v-list-item-content>
                    <v-list-item-title>
                      <v-icon> mdi-format-list-checks </v-icon>
                      Total: {{ count_minutes }}
                    </v-list-item-title>
                  </v-list-item-content>
                  <v-list-item-content>
                    <v-list-item-title>
                      <v-icon> mdi-share-variant </v-icon>
                      Compartidas: {{ count_shared_minutes }}
                    </v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </template>
            </v-list>
          </v-card>
        </v-col>
        <v-col cols="2">
          <v-card>
            <v-subheader> ALIMENTOS NUTRICIONISTAS </v-subheader>
            <v-divider></v-divider>
            <v-list>
              <template>
                <v-list-item>
                  <v-list-item-content>
                      <v-list-item-title>
                        <v-icon> mdi-food-apple </v-icon>
                        Total: {{ count_foods }}
                      </v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </template>
            </v-list>
          </v-card>
        </v-col>
    </v-row>
  </app-layout>
</template>
<script>
import AppLayout from '../Layouts/AppLayout'
import { Link } from '@inertiajs/inertia-vue'
export default {
  components: {
    AppLayout,
    Link
  },
  props: {
      count_users: '',
      count_users_basic: '',
      count_users_profetional: '',
      count_minutes: '',
      count_shared_minutes: '',
      count_foods: ''
    },
  data() {
    return {
      //
    }
  }
}
</script>