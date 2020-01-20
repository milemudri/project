import axios from 'axios';
import React, { Component } from 'react';
import Dashboard from './modal'

class urlshort extends Component {
  constructor(props){
    super(props);
    this.state = {url: ''};

    this.handleChange1 = this.handleChange1.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.hasErrorFor = this.hasErrorFor.bind(this)
  }
  handleChange1(e){
    this.setState({
      url: e.target.value,
      error:''
    })
  }
  hasErrorFor (field) {
      return (
          <span className='invalid-feedback'>
            <strong>{this.state.errors}</strong>
          </span>
        )
      }
  handleSubmit(e){
    e.preventDefault();
    const link = this.state.url

    let uri = '/up/public/generatelink?link='+link;
    axios.post(uri)
    .then((response) => {

        document.getElementById('result').innerHTML="<div class='alert alert-dark' >Your link is <a href="+response.data+">"+response.data+"</a></div>"
        document.getElementById('error').innerHTML=""
        console.log(response.data)
    })
    .catch(error => {
        document.getElementById('result').innerHTML=""
        document.getElementById('error').innerHTML="<div class='alert alert-danger'>"+error.response.data.errors['link']+'</div>'

    });

  }

    render() {const {error}=this.state;
      return (
      <div className='visible-print-inline-block'>
        <h1>Create short link</h1>
        <form onSubmit={this.handleSubmit}>
          <div className="row">
            <div className="col-md-6">
              <div className="form-group">
                <label>URL :</label>
                <input type="text" className="form-control" onChange={this.handleChange1}/>
              </div>
            </div>
            </div>
            <br />
            <div className="form-group">
              <button className="btn btn-primary">Create</button>
            </div>
            <div id="error" ></div>
            <div id="result"></div>
        </form>
  </div>
      )
    }
}
export default urlshort;
