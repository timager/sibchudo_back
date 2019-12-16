import React, {Component} from "react";
import "./AbstractPage.css";
import Header from "./Header/Header";
import Menu from "./Header/Menu/Menu";
import TitleDescription from "./Header/TitleDescription/TitleDescription";
import Footer from "./Footer/Footer";


class AbstractPage extends Component {

    render() {
        return (<div>
                <Header>
                    <title>{(this.props.title) ? this.props.title : 'Сибирское Чудо'}</title>
                    <Menu/>
                    <TitleDescription/>
                </Header>
                <div className={'content'}>{this.props.children}</div>
                <Footer/>
            </div>

        );
    }
}

export default AbstractPage;