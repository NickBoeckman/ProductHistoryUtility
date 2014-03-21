SPDX Product History Utility
=========

<h5>System Overview</h5>

<div>
  <p>
    The Software Package Data Exchange (SPDX) specification is a formatting standard for
    communicating the licenses and copyrights associated with a software package. Being able to
    explicate this information is a required function for operations support system management
    within an organization.
  </p>
  
  <p>
    The <a href="http://spdxhub.ist.unomaha.edu/">SPDX Dashboard</a> will serve as the central                              repository for SPDX documents, facilitating uploads, retrieval, modification, and sharing of SPDX
    documents. The goal of the Product History Utility (PHU) is to enable a company to create
    relationships between the SPDX documents and the products that contain those licenses.
    The Product History Utility will be created as a component of the SPDX Dashboard. Having the
    Product History Utility  as a part of the SPDX Dashboard will remove the need for
    maintaining two separate databases of license documentation, and increase the SPDX toolset.
  </p>
  
  <p>
    The SPDX Product History Utility will create a relationship between a company’s products, such as televisions or
    computers, and the software packages that apply to them. This will allow the Product History
    Utility to establish relationships between revisions of software, thereby allowing for report
    generation of license changes to products and packages over time.
  </p>
  
  <p>
    One of the requirements of companies that distribute licensed software is to notify the consumer
    of any license changes that may occur to their products. The PHU will provide a simple solution,
    by generating QR codes that will link the consumers back to the license change page and can
    be attached to the product at the time of sale. 
  </p>
</div>

<h5>Current Version</h5>
<a href="https://github.com/zwmcfarland/ProductHistoryUtility/blob/master/ChangeLog.md">Version 1.0</a>

<h5>License</h5>
<ul>
  <li>Source  Code: Apache 2.0</li>
  <li>Documentation: Creative Commmons BY-SA-3.0</li>
</ul>

<h5>Copyright</h5>
copyright © 2014 David Le, Nick Boeckman, Zachary McFarland

<h5>Technical Specifications</h5>
<ul>
  <li>Processor: 4 Ghz</li>
  <li>OS: Ubuntu 12.04 LTS</li>
  <li>Dependencies: Apache, mySql</li>
  <li>Memory: 16 Gb</li>
</ul>

<h5>System Design</h5>
<a href="https://github.com/zwmcfarland/ProductHistoryUtility/blob/master/Documentation/Dataflow%20Diagram%20and%20Decomposition/DataflowDiagram.pdf">Data Flow Diagram</a>

<h5>Installation</h5>
<ol>
  <li>Install the <a href="">SPDX Dashboard</a></li>
  <li>Copy the contents of the <a href="https://github.com/zwmcfarland/ProductHistoryUtility/tree/master/src">src</a> folder into the dashboard install directory</li>
</ol>

<h5>Usage</h5>
Screen shots: <a href="https://github.com/zwmcfarland/ProductHistoryUtility/tree/master/img">https://github.com/zwmcfarland/ProductHistoryUtility/tree/master/img</a>

Working System Example: <a href="http://54.218.86.78/SPDX/phu/index.php">http://54.218.86.78/SPDX/phu/index.php</a>

<h5>Communities</h5>
SPDX OSS Community

<h5>Communication</h5>
The PHU team can be contacted through the <a href="https://lists.spdx.org/mailman/listinfo/spdx-tech">SPDX-Tech mailing list.</a>

<h5>Code Management</h5>
Contributions to the PHU will be decided by a community vote.
Changes to SPDX tooling standards will be brought to advisory board: <a href="https://trello.com/b/IfA3oIhe/spdx­tools">https://trello.com/b/IfA3oIhe/spdx­tools</a>


<h1>OLD</h1>
The data flow diagram listed at
<a href="https://github.com/zwmcfarland/ProductHistoryUtility/tree/master/Documentation">https://github.com/zwmcfarland/ProductHistoryUtility/tree/master/Documentation</a> is an overview
of the system as it related to the SPDX Product History Utility  module, including the different
components of the module, and how they interrelate with the dashboard and database.
<h5>Prototype</h5>
Hosted prototype: http://54.218.86.78/SPDX/phu/index.php

System Requirements
 GitHub Repository for code/documentation
­ Open Source IDE for HTML development
­ SPDX Data base
­ Google Docs for documentation collaboration.
­ Coding languages: JavaScript/HTML/CSS/PHP
­ Dashboard API ­ https://github.com/joerter/spdx­dashboard
­ System specifications for host server ­ SPDX dev
­ Domain name: spdx.ist.unomaha.edu
bStakeholders:



<h5>Community Management Plan</h5>
Our team holds regular meetings every Tuesday at 5:30, in addition to class times on
Mondays and Wednesdays. We have utilized a number of correspondence methods, including
email, Google Docs, Trello, and the GitHub repository.

Communication with the SPDX community will take place within the GitHub repository :
<a href="https://github.com/zwmcfarland/ProductHistoryUtility">https://github.com/zwmcfarland/ProductHistoryUtility</a>
In order to fully engage the community, we first need to inform them of our project. We are
planning to make an announcement to the SPDX­General mailing list describing our work and
what our goals are shortly after February 26th. In the announcement, we will release a working
prototype and a link to our GitHub repository to the community so they may get an understanding
of our project.
Since we will need to use the API created by the dashboard team for communication with the
server, we will relay any additional needed queries through email, in­class discussion, and the
SPDX Tooling Trello Board <a href="https://trello.com/b/IfA3oIhe/spdx­tools">https://trello.com/b/IfA3oIhe/spdx­tools</a>.

<h5>Distribution System</h5>
All of our assignments, documentation, and source code will be uploaded to the project’s GitHub
repository. Any requests for these items will be directed to the aforementioned repository.
We will also be monitoring related GitHub Repositories, including the Dashboard GitHub
specifically. Any information we may have that will be useful to other groups, such as data
schema changes, will be posted to the SPDX Tooling Trello Board.

<h5>Description of Community Representation</h5>
A prototype will be hosted at:  <a href="http://54.218.86.78/SPDX/index.php">http://54.218.86.78/SPDX/index.php</a>
A GitHub repository will contain source code and use cases.
https://github.com/zwmcfarland/ProductHistoryUtility

<h5>Code Contribution Management Plan</h5>
Through the duration of this academic semester, any contributions from outside the
development team will be reviewed by the team and then decided by a vote from the team. After
the release of the PHU, additional contributions will be decided through a community vote.Any changes to SPDX tooling standards will be brought to the appropriate advisory boards within
the class.



<h5>Database</h5>
The Product History Utility will use a mySQL database hosted at spdx.ist.unomaha.edu. PHU will
connect to the database via a web api being created by the SPDX Dashboard team. All changes
to the database will be revised by the Database Advisory Board, which include members from
every SPDX tooling team.

<h5>Data Schema</h5>
The data schema used in our project will be the same as the rest of the SPDX Tooling groups.
To view the schema please visit the following url:
<a href="https://github.com/zwmcfarland/ProductHistoryUtility/blob/master/Data%20Schemas/SPDXDatabaseSchema.xls">https://github.com/zwmcfarland/ProductHistoryUtility/blob/master/Data%20Schemas/SPDXDatabaseSchema.xls</a>


