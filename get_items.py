# -*- coding: utf-8 -*-
import HTMLParser

class My_SN_HTMLParser(HTMLParser.HTMLParser):
    def   __init__ (self):
        HTMLParser.HTMLParser. __init__ (self)
        self.link = ""
        self.text = ""
        self.items = []
        self.flag = ""
    def handle_starttag(self,tag,attrs):
        if tag=='a' and attrs:
            #��attrsת����dict
            #{'href': 'http://blog.damontimm.com/how-to-install-netatalk-afp-on-ubuntu-with-encrypted-authentication/',
            #'id': 'title_a_351', 'onclick': 'update_click_num(351);', 'target': '_blank'}
            d_attrs=dict(attrs)
            #print d_attrs
            if 'target' in d_attrs.keys() and 'href' in d_attrs.keys():
                if  d_attrs['target'] == '_blank':
                    self.link = d_attrs['href']
                    self.flag = True
    def handle_data(self,data):
        #if tag == "a":
        if self.flag == True :
            self.text = data
            #�����Ӻ�URL�����б�
            self.items.append((self.text,self.link))
    def handle_endtag(self,tag):
        #���������ǩ
        if tag == 'a' and self.flag== True :
            self.flag = False
    def getItems(self):
        return self.items

class My_CSDN_HTMLParser(HTMLParser.HTMLParser):
    def   __init__ (self):
        HTMLParser.HTMLParser. __init__ (self)
        self.link = ""
        self.text = ""
        self.items = []
        self.flag = ""
    def handle_starttag(self,tag,attrs):
        if tag=='a' and attrs:
            
            #��attrsת����dict
            #{'href': 'http://blog.damontimm.com/how-to-install-netatalk-afp-on-ubuntu-with-encrypted-authentication/',
            #'id': 'title_a_351', 'onclick': 'update_click_num(351);', 'target': '_blank'}
            d_attrs=dict(attrs)
            #print d_attrs
            #csdn�ı�������id ������Ҫ�жϣ�������һЩ���ߵ�����Ҳȡ��
            if 'target' in d_attrs.keys() and 'id' in d_attrs.keys() and 'href' in d_attrs.keys():
                if  d_attrs['target'] == '_blank':
                    self.link = d_attrs['href']
                    self.flag = True
               
    def handle_data(self,data):
        #if tag == "a":
        if self.flag == True :
            self.text = data
            #�����Ӻ�URL�����б�
            self.items.append((self.text,self.link))
    def handle_endtag(self,tag):
        #���������ǩ
        if tag == 'a' and self.flag== True :
            self.flag = False
    def getItems(self):
        return self.items
