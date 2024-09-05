<template>
    <Head title="Portfólio" />
    <v-app>
        <v-main id="title" class="fill-height">
            <v-parallax src="/images/sections/first.webp" height="100vh">
                <div
                    class="d-flex flex-column fill-height justify-center align-center"
                >
                    <h1 class="text-h1 font-weight-bold text-center">
                        Matheus Dresch
                    </h1>
                    <h4 class="text-h4">Desenvolvedor web</h4>
                </div>
            </v-parallax>
            <v-parallax src="/images/sections/second.webp" :height class="py-8">
                <v-row class="align-center fill-height px-sm-0 px-4">
                    <v-col class="d-flex justify-center" cols="12" sm="3">
                        <v-img
                            max-height="256"
                            max-width="256"
                            cover
                            src="/images/pfp.webp"
                            class="rounded-circle elevation-6"
                        />
                    </v-col>
                    <v-spacer />
                    <v-col cols="12" sm="4">
                        <h2 class="text-h3 mb-3 font-weight-black">
                            SOBRE MIM:
                        </h2>
                        <p class="text-justify">
                            Eu sou o Matheus! Programando desde os 16 anos e
                            atualmente cursando Ciência da Computação, tenho
                            experiência em desenvolvimento web com PHP + Laravel
                            e Vue.js, além de experiência com bancos de dados
                            MySQL, MongoDB e PostgreSQL. Recentemente, comecei a
                            trabalhar com Python para desenvolver sistemas em
                            AWS Lambda e Step Functions. Quanto as minhas soft
                            skills, aprendo rápido, trabalho bem em equipe e
                            utilizo métodos ágeis no meu dia a dia (Scrum,
                            Kanban, etc...)
                        </p>
                    </v-col>
                    <v-spacer />
                    <v-col cols="12" sm="3">
                        <h2 class="text-h3 mb-3 font-weight-black">STACK:</h2>
                        <div class="d-flex flex-wrap ga-3 w-sm-75 w-100">
                            <badge tool="php" />
                            <badge tool="laravel" />
                            <badge tool="javascript" />
                            <badge tool="typescript" />
                            <badge tool="vuejs" />
                            <badge tool="sql" />
                            <badge tool="python" />
                            <badge tool="docker" />
                            <badge tool="cloudflare" />
                        </div>
                    </v-col>
                </v-row>
            </v-parallax>
            <v-parallax
                src="/images/sections/third.webp"
                :height
                class="pa-sm-16 py-8 d-flex align-center"
            >
                <h2 class="text-h3 text-center mb-3 font-weight-black">
                    PROJETOS:
                </h2>
                <v-slide-group show-arrows>
                    <v-slide-group-item v-for="(project, key) in projects" :key>
                        <project :project />
                    </v-slide-group-item>
                </v-slide-group>
            </v-parallax>
            <v-parallax
                src="/images/sections/fourth.webp"
                :height
                class="pa-sm-16 py-8 d-flex align-center"
            >
                <h2 class="text-h3 text-center mb-3 font-weight-black">
                    CONTATO:
                </h2>
                <v-row>
                    <v-col cols="12" sm="6" class="px-8">
                        <v-sheet class="pa-4 rounded-lg">
                            <v-form
                                @submit.prevent="
                                    form.post('/message', {
                                        preserveScroll: true,
                                    })
                                "
                            >
                                <h3>Envie uma mensagem!</h3>
                                <v-text-field
                                    v-model="form.name"
                                    @input="clearError('name')"
                                    label="Seu nome"
                                    :error-messages="form.errors.name"
                                    variant="solo-filled"
                                />
                                <v-text-field
                                    v-model="form.email"
                                    @input="clearError('email')"
                                    label="Seu e-mail"
                                    :error-messages="form.errors.email"
                                    variant="solo-filled"
                                />
                                <v-text-field
                                    v-model="form.subject"
                                    @input="clearError('subject')"
                                    label="Assunto"
                                    :error-messages="form.errors.subject"
                                    variant="solo-filled"
                                />
                                <v-textarea
                                    v-model="form.message"
                                    @input="clearError('message')"
                                    label="Mensagem"
                                    :error-messages="form.errors.message"
                                    variant="solo-filled"
                                />
                                <v-btn
                                    color="green"
                                    type="submit"
                                    variant="tonal"
                                    block
                                    :disabled="form.hasErrors"
                                >
                                    ENVIAR
                                </v-btn>
                            </v-form>
                        </v-sheet>
                    </v-col>
                    <v-col
                        cols="12"
                        sm="6"
                        class="px-8 d-flex flex-column ga-4"
                    >
                        <v-card
                            v-for="(social, key) in socials"
                            :key
                            :title="social.title"
                            :subtitle="social.subtitle"
                            link
                            :href="social.link"
                            target="_blank"
                        >
                            <template #prepend>
                                <v-icon size="x-large" :icon="social.icon" />
                            </template>
                        </v-card>
                    </v-col>
                </v-row>
            </v-parallax>
            <v-sheet class="pa-4 text-center">
                <p>
                    Imagens por
                    <a class="text-white" href="https://pexels.com"
                        >pexels.com</a
                    >
                </p>
                <p>Matheus Dresch - {{ year }}</p>
            </v-sheet>
        </v-main>
    </v-app>
</template>

<script setup lang="ts">
import { Head, useForm } from "@inertiajs/vue3";

import Badge from "@/Components/Badge.vue";
import Project from "@/Components/Project.vue";
import { computed } from "vue";
import { useDisplay } from "vuetify";

const { smAndDown } = useDisplay();

const year = new Date().getFullYear();
const height = computed(() => (smAndDown.value ? "fit-content" : "100vh"));

const form = useForm({
    name: null,
    email: null,
    subject: null,
    message: null,
});

type FormField = keyof typeof form.errors;

const clearError = (field: FormField) => {
    form.clearErrors(field);
};

const projects = [
    {
        image: "/images/nospend.webp",
        title: "NoSpend",
        subtitle: "Projeto",
        description: "Gerenciador de despesas",
        tools: ["laravel", "vuejs", "cloudflare", "sql"],
        repository: "https://github.com/powerclonic/nospend",
        demo: "https://nospend.dresch.dev",
    },
    {
        image: "/images/portfolio.webp",
        title: "Portfólio",
        subtitle: "Projeto",
        description: "Site pessoal e portfólio",
        tools: ["laravel", "vuejs", "cloudflare"],
        repository: "https://github.com/powerclonic/dresch.dev",
        demo: "https://dresch.dev",
    },
];

const socials = [
    {
        title: "GitHub",
        subtitle: "Repositório com meus projetos",
        link: "https://github.com/powerclonic",
        icon: "mdi-github",
    },
    {
        title: "LinkedIn",
        subtitle: "Um resumo da minha carreira",
        link: "https://linkedin.com/in/matheus-dresch",
        icon: "mdi-linkedin",
    },
    {
        title: "E-mail",
        subtitle: "matheus@dresch.dev",
        link: "mailto:matheus@dresch.dev",
        icon: "mdi-email-fast",
    },
];
</script>
