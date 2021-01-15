<template>
    <tfoot>
    <tr v-if="loading">
        <td :colspan="fields.length + 2">
            <div class="relative">
                <div class="flex items-center justify-center z-50 p-6">
                    <loader class="text-60"/>
                </div>
            </div>
        </td>
    </tr>

    <template v-else-if="footer.length">
        <tr
            v-for="(row, i) in footer"
            :key="i"
        >
            <td v-if="i === 0" :rowspan="footer.length"></td>
            <td
                v-for="(col, ii) in row"
                :key="ii"
                v-bind="col.attributes"
                v-html="col.content"
            ></td>
            <td v-if="i === 0" :rowspan="footer.length"></td>
        </tr>
    </template>
    </tfoot>
</template>

<script>

export default {
    props: {
        resourceName: {
            type: String
        },
        fields: {
            type: Array
        },
    },
    created() {
        this.eventCallback = args => {
            this.load(args);
        };

        Nova.$on('load-resource-table-footer', this.eventCallback);
    },
    destroyed() {
        Nova.$off('load-resource-table-footer', this.eventCallback);
    },
    data() {
        return {
            eventCallback: null,
            loading: false,
            footer: [],
        }
    },
    methods: {
        load({resourceName, requestParams}) {
            if (this.loading || resourceName !== this.resourceName) {
                return;
            }
            this.loading = true;

            Nova
                .request()
                .get('/nova-vendor/resource-table-footer/' + resourceName, {
                    params: requestParams,
                })
                .then(({data}) => {
                    this.footer = data.footer;
                })
                .finally(() => {
                    this.loading = false;
                })
        },
    },
}
</script>

<style scoped>
tr {
    background-color: var(--30);
    font-size: .9rem;
}

tr:hover td {
    background-color: initial;
}

td {
    padding: .75rem;
    height: initial;
    font-weight: 800;
    color: var(--80);
}
</style>
