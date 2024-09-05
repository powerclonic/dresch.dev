<template>
    <v-btn
        v-if="icon"
        icon
        readonly
        variant="tonal"
        :color="selectedTool.color"
    >
        <v-icon :icon="selectedTool.icon" />
    </v-btn>
    <v-chip
        v-else
        variant="tonal"
        :color="selectedTool.color"
        :prepend-icon="selectedTool.icon"
        >{{ selectedTool.text }}</v-chip
    >
</template>

<script setup lang="ts">
import { computed } from "vue";

const props = defineProps({
    tool: {
        type: String,
        required: true,
    },
    icon: {
        type: Boolean,
        default: false,
    },
});

const toolConfig = {
    php: {
        color: "#8892be",
        icon: "mdi-elephant",
        text: "PHP",
    },
    cloudflare: {
        color: "#F38020",
        icon: "mdi-cloud",
        text: "CloudFlare",
    },
    docker: {
        color: "#0db7ed",
        icon: "mdi-docker",
        text: "Docker",
    },
    javascript: {
        color: "#f7df1e",
        icon: "mdi-language-javascript",
        text: "JavaScript",
    },
    laravel: {
        color: "#f55247",
        icon: "mdi-laravel",
        text: "Laravel",
    },
    python: {
        color: "#4584b6",
        icon: "mdi-language-python",
        text: "Python",
    },
    typescript: {
        color: "blue",
        icon: "mdi-language-typescript",
        text: "TypeScript",
    },
    sql: {
        color: "#4f5b93",
        icon: "mdi-database",
        text: "SQL",
    },
    vuejs: {
        color: "#4dba87",
        icon: "mdi-vuejs",
        text: "VueJS",
    },
};

const selectedTool = computed(() => toolConfig[props.tool]);
</script>
