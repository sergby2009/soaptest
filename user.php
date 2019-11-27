<?php
    header ("Content-Type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
?>
<definitions xmlns:soap="http://www.w3.org/1999/xhtml">
    xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/"
    xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xmlns:mime="http://schemas.xmlsoap.org/wsdl/mime/"
    xmlns:tns="http://<?=$_SERVER['HTTP_HOST']?>/"
    xmlns:xs="http://www.w3.org/2001/XMLSchema"
    xmlns:soap12="http://schemas.xmlsoap.org/wsdl/soap12/"
    xmlns:http="http://schemas.xmlsoap.org/wsdl/http/"
    name="UserWsdl"
    xmlns="http://schemas.xmlsoap.org/wsdl/">

    <types>
        <xs:schema xmlns:tns="http://schemas.xmlsoap.org/wsdl/"
        xmlns="http://www.w3.org/2001/XMLSchema"
        xmlns:xs="http://www.w3.org/2001/XMLSchema"
        elementFormDefault="qualified"
        targetNamespace="http://<?=$_SERVER['HTTP_HOST']?>/">

        <complexType name="User">
            <sequence>
                <element name="firstname" type="string" minOccurs="1" maxOccurs="1" />
                <element name="lastname" type="string" minOccurs="1" maxOccurs="1" />
                <element name="bday" type="dateTime" minOccurs="1" maxOccurs="1" />
                <element name="tel" type="string" minOccurs="0" maxOccurs="1" />
                <element name="pasport" type="string" minOccurs="1" maxOccurs="1" />
            </sequence>
        </complexType>

        <complexType name="UserList">
           <sequence>
                <element minOccurs="1" maxOccurs="unbounded" name="user" type="User" />
           </sequence>
        </complexType>

        <element name="sendRequest">
            <complexType>
                <sequence>
                    <element name="userList" type="UserList"/>
                 </sequence>
            </complexType>
        </element>

        <element name="sendResponse">
            <complexType>
                <sequence>
                    <element name="status" type="boolean"/>
                </sequence>
            </complexType>
        </element>

        <element name="getRequest">
            <complexType>
                <sequence>
                    <element name="inf" type="decimal"/>
                </sequence>
            </complexType>
        </element>

        <element name="getResponse">
            <complexType>
                <sequence>
                    <element name="getList" type="UserList"/>
                </sequence>
            </complexType>
        </element>

        </xs:schema>
    </types>

    <!-- Сообщения процедуры sendUser -->
    <message name="sendUserRequest">
        <part name="sendRequest" element="tns:sendRequest" />
    </message>
    <message name="sendUserResponse">
        <part name="sendResponse" element="tns:sendResponse" />
    </message>
    <!-- Сообщения процедуры getUser -->
    <message name="getUserRequest">
        <part name="getRequest" element="tns:getRequest" />
    </message>
    <message name="getUserResponse">
        <part name="getResponse" element="tns:getResponse" />
    </message>

    <!-- Формат процедур к сообщениям -->
    <portType name="UserServicePortType">
        <operation name="sendUser">
            <input message="tns:sendUserRequest" />
            <output message="tns:sendUserResponse"/>
        </operation>
        <operation name="getUser">
            <input message="tns:getUserRequest" />
            <output message="tns:getUserResponse"/>
        </operation>
    </portType>

    <!-- Формат процедур веб-сервиса -->
    <binding name="UserServiceBinding" type="tns:UserServicePortType">
        <soap:binding style="rpc" transport="http://schemas.xmlsoap.org/soap/http" />
        <operation name="sendUser">
            <soap:operation soapAction="" />
            <input>
                <soap:body use="literal" />
            </input>
            <output>
                <soap:body use="literal" />
            </output>
        </operation>
        <operation name="getUser">
            <soap:operation soapAction="" />
            <input>
            <soap:body use="literal" />
            </input>
            <output>
                <soap:body use="literal" />
            </output>
        </operation>
    </binding>

    <!-- Определение сервиса -->
    <service name="UserService">
        <port name="UserServicePort" binding="tns:UserServiceBinding">
            <soap:addres location="http://<?=$_SERVER['HTTP_HOST']/user.php?>" />
        </port>
    </service>
</definitions>