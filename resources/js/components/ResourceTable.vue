<template>
    <table
        v-if="resources.length > 0"
        class="table w-full"
        cellpadding="0"
        cellspacing="0"
        data-testid="resource-table"
    >
        <thead>
        <tr>
            <!-- Select Checkbox -->
            <th
                :class="{
                'w-16': shouldShowCheckboxes,
                'w-8': !shouldShowCheckboxes,
              }"
            >
                &nbsp;
            </th>

            <!-- Field Names -->
            <th v-for="field in fields" :class="`text-${field.textAlign}`">
                <sortable-icon
                    @sort="requestOrderByChange(field)"
                    @reset="resetOrderBy(field)"
                    :resource-name="resourceName"
                    :uri-key="field.sortableUriKey"
                    v-if="field.sortable"
                >
                    {{ field.indexName }}
                </sortable-icon>

                <span v-else>{{ field.indexName }}</span>
            </th>

            <!-- Actions, View, Edit, Delete -->
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <tr
            v-for="(resource, index) in resources"
            @actionExecuted="$emit('actionExecuted')"
            :testId="`${resourceName}-items-${index}`"
            :key="resource.id.value"
            :delete-resource="deleteResource"
            :restore-resource="restoreResource"
            is="resource-table-row"
            :resource="resource"
            :resource-name="resourceName"
            :relationship-type="relationshipType"
            :via-relationship="viaRelationship"
            :via-resource="viaResource"
            :via-resource-id="viaResourceId"
            :via-many-to-many="viaManyToMany"
            :checked="selectedResources.indexOf(resource) > -1"
            :actions-are-available="actionsAreAvailable"
            :should-show-checkboxes="shouldShowCheckboxes"
            :update-selection-status="updateSelectionStatus"
        />
        </tbody>
        <resource-table-footer :resource-name="resourceName" :fields="fields"/>
    </table>
</template>

<script>
import ResourceTable from "@nova-path/resources/js/components/ResourceTable";

export default {
    extends: ResourceTable,
}
</script>

<style scoped>

</style>
