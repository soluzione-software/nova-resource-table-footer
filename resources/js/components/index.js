import ResourceTable from "./ResourceTable";
import ResourceTableFooter from "./ResourceTableFooter";

export default vue => {
    vue.component('resource-table', ResourceTable);
    vue.component('resource-table-footer', ResourceTableFooter);
}
