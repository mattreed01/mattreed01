/*Name: Matthew Reed
  Student No.: 19100133
  Position: 88*/

import React from "react";
import ReactDOM from "react-dom";

import {ModuleList} from "./components/ModuleList"

var modules = [
    {code: "IMY220", department: "Information Science", mark: 74},
    {code: "COS212", department: "Computer Science", mark: 48},
    {code: "IMY310", department: "Information Science", mark: 78},
    {code: "WTW126", department: "Mathematics", mark: 45},
    {code: "AIM101", department: "Information Science", mark: 88},
    {code: "COS110", department: "Computer Science", mark: 68},
    {code: "VIO102", department: "Visual Arts", mark: 80},
    {code: "COS330", department: "Computer Science", mark: 75},
    {code: "IMY320", department: "Information Science", mark: 62}
];

ReactDOM.render(
        <ModuleList minimum={20} modules={modules} />,
        document.getElementById("react-container")
);