import axios from 'axios';
import React, { Component } from 'react';

class urllist extends Component {
    constructor(props){
        super(props);
        this.state={
            'link':[]
        }
        axios.get('/up/public/listlink').then((response) => {
          console.log(response);
          this.setState({
            link: response.data
          })
        });
    }
    render() {const { link } = this.state
      return (
      <div>
        <ul className='visible-print-inline-block col-md-12'>
            <li className='list-group-item d-flex justify-content-between align-items-center'>

              <div className="align-items-left btn-outline-primary">Link</div>

              <div className="align-items-right btn-outline-warning"> Code</div>
              </li>
                    {link.map(link => (

                      <li className='list-group-item d-flex justify-content-between align-items-center' key={link.id}>

                        <div className="align-items-left btn-outline-primary">{link.link}</div>

                        <div className="align-items-right btn-outline-warning"> {link.code}</div>
                        </li>
                    ))}
        </ul>
      </div>
      )
    }
}
export default urllist;
