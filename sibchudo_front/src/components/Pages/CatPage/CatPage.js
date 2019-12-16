import React, {Component} from "react";
import AbstractPage from "../AbstractPage/AbstractPage";
import axios from "axios";
import TitleH2 from "../../BaseElements/TitleH2/TitleH2";
import "./CatPage.css";
import Img from 'react-image';
import Loader from 'react-loader-spinner';
import defaultCatImage from "./assets/default-cat.jpg";
import CatInfo from "./CatInfo/CatInfo";
import CatName from "../../BaseElements/Cat/CatName/CatName";

const catTemplate = {
    name: "Загрузка...",
    gender: "Загрузка...",
    avatar: {
        destination: ""
    },
    litter: {
        birthday: null,
        community: {
            name: "Загрузка..."
        }
    }
};

class CatPage extends Component {
    constructor(props) {
        super(props);
        this.state = {
            cat: null
        };
    }

    componentDidUpdate(prevProps, prevState, snapshot) {
        if (this.props.match.params.id !== prevProps.match.params.id) {
            this.loadCat();
        }
    }

    componentDidMount() {
        this.loadCat();
    }

    render() {
        let avatar;
        let cat;
        if (!this.state.cat) {
            cat = catTemplate;
            avatar = <Loader type="Oval" width={250} height={250}/>
        } else {
            cat = this.state.cat;
            avatar = <Img src={cat.avatar ? [cat.avatar.destination, defaultCatImage] : defaultCatImage}/>
        }
        return (
            <AbstractPage title={cat.name}>
                <TitleH2 text={<CatName cat={cat}/>}/>
                <div className={"cat_info_container"}>
                    <CatInfo cat={cat}/>
                    <div className={"cat_avatar"}>
                        {avatar}
                    </div>
                </div>
            </AbstractPage>
        );
    }

    loadCat() {
        let self = this;
        axios.post("/api/cat/" + this.props.match.params.id + "/get").then(function (result) {
            if (result.data != null) {
                self.setState({cat: result.data});
                console.log(self.state.cat);
            }
        });
    }
}

export default CatPage;