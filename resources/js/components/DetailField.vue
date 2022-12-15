<template>
    <PanelItem :index="index" :field="field" />
</template>

<script>
import PanelItem from "./PanelItem";

export default {
    components: {
        PanelItem,
    },
    props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
}
</script>
