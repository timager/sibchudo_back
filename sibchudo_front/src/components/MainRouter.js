import React, {Component} from "react";

import {
    BrowserRouter as Router,
    Route,
    Switch
} from 'react-router-dom';
import HomePage from "./Pages/HomePage/HomePage";
import CatPage from "./Pages/CatPage/CatPage";
import AdminMainPage from "./Pages/Admin/AdminMainPage/AdminMainPage";


class MainRouter extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <Router>
                <Switch>
                    <Route exact path="/" children={<HomePage/>}/>
                    <Route exact path="/admin" children={<AdminMainPage/>}/>
                    <Route exact path="/cat/:id" component={CatPage}/>
                    <Route children={<div>404 not found</div>}/>
                </Switch>
            </Router>
        )
    }
}

export default MainRouter;