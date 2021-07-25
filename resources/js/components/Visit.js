import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import Chart from "react-apexcharts";
import axios from "axios";

const initialOptions = {
    chart: {
        id: "basic-bar",
    },
    xaxis: {
        categories: [],
    },
    noData: {
        text: "NoData...",
    },
};

const initialSeries = [
    {
        name: "series-1",
        data: [],
    },
];

function Visit() {
    const [isLoading, setIsLoading] = useState(true);
    const [isError, setIsError] = useState(false);
    const [options, setOptions] = useState(initialOptions);
    const [series, setSeries] = useState(initialSeries);

    useEffect(() => {
        axios
            .get("api/visits", { pathSearch: "" })
            .then((res) => res.data)
            .catch(() => setIsError(true))
            .finally(() => setIsLoading(false));
    });

    if (isError) return <div>No se pudo cargar la data</div>;
    //if (isLoading) return <div>Cargando..</div>;

    return (
        <div className="mixed-chart">
            <Chart
                options={options}
                series={series}
                type="bar"
                width="500"
                noData
            />
        </div>
    );
}

export default Visit;

if (document.getElementById("visit-component")) {
    ReactDOM.render(<Visit />, document.getElementById("visit-component"));
}
