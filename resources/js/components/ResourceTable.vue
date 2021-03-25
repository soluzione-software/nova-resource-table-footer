<template>
    <table
        v-if="resources.length > 0"
        class="table w-full"
        cellpadding="0"
        cellspacing="0"
        data-testid="resource-table"
    >
        <resource-table-head
            :fields="fields"
            :requestOrderByChange="requestOrderByChange"
            :resetOrderBy="resetOrderBy"
            :resourceName="resourceName"
            :shouldShowCheckboxes="shouldShowCheckboxes"
        />

        <resource-table-body
            :actionsAreAvailable="actionsAreAvailable"
            :deleteResource="deleteResource"
            :relationshipType="relationshipType"
            :resourceName="resourceName"
            :resources="resources"
            :restoreResource="restoreResource"
            :selectedResources="selectedResources"
            :shouldShowCheckboxes="shouldShowCheckboxes"
            :updateSelectionStatus="updateSelectionStatus"
            :viaManyToMany="viaManyToMany"
            :viaRelationship="viaRelationship"
            :viaResource="viaResource"
            :viaResourceId="viaResourceId"
        />
        <resource-table-footer :resource-name="resourceName" :fields="fields"/>
    </table>
</template>

<script>
import ResourceTable from "@custom-ui-path/resources/js/components/ResourceTable";

export default {
    extends: ResourceTable,
}
</script>

<style scoped>

</style>
