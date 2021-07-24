<template>
  <app-layout id="inspire" app dark>
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
                      <v-icon> mdi-account </v-icon>
                      Plan Básico: {{ count_users_basic }}
                    </v-list-item-title>
                  </v-list-item-content>
                  <v-list-item-content>
                    <v-list-item-title>
                      <v-icon> mdi-account-check </v-icon>
                      Plan Profesional: {{ count_users_profetional }}
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
export default {
  components: {
    AppLayout
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