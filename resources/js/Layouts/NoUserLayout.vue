<template>
    <div class="min-vh-100 d-flex flex-column bg-white">
        <!-- Page Header -->
        <header class="py-3 border-bottom bg-dark text-light">
            <nav class="navbar">
                <div class="container">
                    <span class="navbar-brand mb-0 h1">
                      <font-awesome-icon icon="list-check"/>
                      TO-DO
                    </span>
                    <slot name="right-navbar">

                    </slot>
                </div>
            </nav>
        </header>

        <!-- Page Content -->
        <main class="my-5 flex-grow-1 container">
            <slot></slot>
        </main>
    </div>
</template>

<script>
import JetApplicationLogo from "@/Jetstream/ApplicationLogo.vue";
import JetBanner from "@/Jetstream/Banner.vue";
import JetApplicationMark from "@/Jetstream/ApplicationMark.vue";
import JetDropdown from "@/Jetstream/Dropdown.vue";
import JetDropdownLink from "@/Jetstream/DropdownLink.vue";
import JetNavLink from "@/Jetstream/NavLink.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
    props: {
        title: String,
    },

    components: {
        Head,
        JetApplicationLogo,
        JetBanner,
        JetApplicationMark,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        Link,
    },

    data() {
        return {
            showingNavigationDropdown: false,
        };
    },

    methods: {
        switchToTeam(team) {
            this.$inertia.put(
                route("current-team.update"),
                {
                    team_id: team.id,
                },
                {
                    preserveState: false,
                }
            );
        },

        logout() {
            this.$inertia.post(route("logout"));
        },
    },

    computed: {
        path() {
            return window.location.pathname;
        },
    },
};
</script>
