<script>
import Index from "@custom-ui-path/resources/js/views/Index";

export default {
    extends: Index,
    created() {
        this.eventCallback = () => {
            this.$nextTick(() => {
                Nova.$emit('load-resource-table-footer', {
                    resources: this.resources,
                    resourceName: this.resourceName,
                    requestParams: this.resourceRequestQueryString,
                })
            })
        };

        Nova.$on('resources-loaded', this.eventCallback);
    },
    destroyed() {
        Nova.$off('resources-loaded', this.eventCallback);
    },
    data() {
        return {
            eventCallback: null,
        }
    },
}
</script>
