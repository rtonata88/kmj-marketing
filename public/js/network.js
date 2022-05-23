let data = document.getElementById("data").value;

var chart = new OrgChart(document.getElementById("network"), {
    nodeBinding: {
        field_0: "name",
    },
    nodes: JSON.parse(data),
});
